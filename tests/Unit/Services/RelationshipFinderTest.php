<?php

declare(strict_types=1);

use App\Models\Family;
use App\Services\RelationshipFinder;

/**
 * @param  array<string, mixed>  $attributes
 */
function member(string $gender, array $attributes = []): Family
{
    return Family::factory()->create(['gender' => $gender, 'father_id' => null, 'mother_id' => null, ...$attributes]);
}

function marry(Family $husband, Family $wife): void
{
    $husband->update(['spouse' => json_encode([...$husband->refresh()->spouse, $wife->id])]);
}

beforeEach(function (): void {
    $greatGrandpa = member('M');
    $grandpa = member('M', ['father_id' => $greatGrandpa->id]);
    $grandma = member('F');
    marry($grandpa, $grandma);

    $grandUncle = member('M', ['father_id' => $greatGrandpa->id]);
    $grandUnclesSon = member('M', ['father_id' => $grandUncle->id]);

    $maternalGrandpa = member('M');
    $dad = member('M', ['father_id' => $grandpa->id, 'mother_id' => $grandma->id]);
    $mom = member('F', ['father_id' => $maternalGrandpa->id]);
    $stepMom = member('F');
    marry($dad, $mom);
    marry($dad, $stepMom);

    $uncle = member('M', ['father_id' => $grandpa->id, 'mother_id' => $grandma->id]);
    $auntByMarriage = member('F');
    marry($uncle, $auntByMarriage);

    $me = member('M', ['father_id' => $dad->id, 'mother_id' => $mom->id]);
    $wife = member('F');
    marry($me, $wife);
    $wifesFather = member('M');
    $wife->update(['father_id' => $wifesFather->id]);
    $wifesSonFromBefore = member('M', ['mother_id' => $wife->id]);

    $sister = member('F', ['father_id' => $dad->id, 'mother_id' => $mom->id]);
    $sistersHusband = member('M');
    marry($sistersHusband, $sister);
    $halfBrother = member('M', ['father_id' => $dad->id, 'mother_id' => $stepMom->id]);
    $brotherWithUnknownMother = member('M', ['father_id' => $dad->id]);

    $son = member('M', ['father_id' => $me->id, 'mother_id' => $wife->id]);
    $daughterInLaw = member('F');
    marry($son, $daughterInLaw);
    $grandson = member('M', ['father_id' => $son->id]);
    $greatGranddaughter = member('F', ['father_id' => $grandson->id]);
    $nephew = member('M', ['mother_id' => $sister->id]);

    $cousin = member('F', ['father_id' => $uncle->id]);
    $cousinsHusband = member('M');
    marry($cousinsHusband, $cousin);
    $cousinsSon = member('M', ['mother_id' => $cousin->id]);
    $cousinsGrandson = member('M', ['father_id' => $cousinsSon->id]);

    $stranger = member('F');

    $this->tree = get_defined_vars();
    $this->finder = new RelationshipFinder;
});

it('labels how one member is related to another', function (string $subject, string $relative, string $label): void {
    expect($this->finder->find($this->tree[$subject], $this->tree[$relative])['label'])->toBe($label);
})->with([
    'father' => ['dad', 'me', 'father'],
    'mother' => ['mom', 'me', 'mother'],
    'son' => ['me', 'dad', 'son'],
    'daughter' => ['sister', 'mom', 'daughter'],
    'grandfather' => ['grandpa', 'me', 'grandfather'],
    'maternal grandfather' => ['maternalGrandpa', 'me', 'grandfather'],
    'great-grandfather' => ['greatGrandpa', 'me', 'great-grandfather'],
    'grandson' => ['grandson', 'me', 'grandson'],
    'great-granddaughter' => ['greatGranddaughter', 'me', 'great-granddaughter'],
    'sister' => ['sister', 'me', 'sister'],
    'half-brother' => ['halfBrother', 'me', 'half-brother'],
    'brother when one parent is unknown' => ['brotherWithUnknownMother', 'me', 'brother'],
    'uncle' => ['uncle', 'me', 'uncle'],
    'great-uncle' => ['grandUncle', 'me', 'great-uncle'],
    'nephew' => ['nephew', 'me', 'nephew'],
    'niece' => ['cousin', 'dad', 'niece'],
    'first cousin' => ['cousin', 'me', 'first cousin'],
    'first cousin once removed' => ['cousinsSon', 'me', 'first cousin once removed'],
    'first cousin twice removed' => ['cousinsGrandson', 'me', 'first cousin twice removed'],
    "parent's first cousin" => ['grandUnclesSon', 'dad', 'first cousin'],
    'first cousin once removed upwards' => ['grandUnclesSon', 'me', 'first cousin once removed'],
    'wife' => ['wife', 'me', 'wife'],
    'husband' => ['me', 'wife', 'husband'],
    'father-in-law' => ['wifesFather', 'me', 'father-in-law'],
    'son-in-law' => ['me', 'wifesFather', 'son-in-law'],
    'daughter-in-law' => ['daughterInLaw', 'me', 'daughter-in-law'],
    'brother-in-law via spouse' => ['sistersHusband', 'me', 'brother-in-law'],
    'sister-in-law' => ['sister', 'wife', 'sister-in-law'],
    'stepmother' => ['stepMom', 'me', 'stepmother'],
    'stepson' => ['wifesSonFromBefore', 'me', 'stepson'],
    'aunt by marriage' => ['auntByMarriage', 'me', 'aunt'],
    'spouse of a cousin' => ['cousinsHusband', 'me', "first cousin's husband"],
    'relative of a spouse' => ['cousin', 'sistersHusband', "wife's first cousin"],
    'distant in-law' => ['wifesFather', 'sister', 'relative by marriage'],
]);

it('returns the shortest chain of people with how each step is related', function (): void {
    $result = $this->finder->find($this->tree['me'], $this->tree['cousin']);

    expect(array_map(fn (array $step): int => $step['member']->id, $result['path']))
        ->toBe([$this->tree['me']->id, $this->tree['dad']->id, $this->tree['grandpa']->id, $this->tree['uncle']->id, $this->tree['cousin']->id])
        ->and(array_column($result['path'], 'relation'))
        ->toBe([null, 'father', 'father', 'son', 'daughter']);
});

it('returns null when two members are not connected', function (): void {
    expect($this->finder->find($this->tree['stranger'], $this->tree['me']))->toBeNull();
});

it('recognises the same person', function (): void {
    expect($this->finder->find($this->tree['me'], $this->tree['me']))
        ->toMatchArray(['label' => 'same person'])
        ->path->toHaveCount(1);
});

it('does not loop forever on circular parent data', function (): void {
    $first = member('M');
    $second = member('M', ['father_id' => $first->id]);
    $first->update(['father_id' => $second->id]);
    $outsider = member('F');

    expect($this->finder->find($first, $second)['label'])->toBe('father')
        ->and($this->finder->find($first, $outsider))->toBeNull();
});

it('ignores spouse ids pointing at members that no longer exist', function (): void {
    $lonely = member('M');
    setRawSpouseIds($lonely, [999999]);

    expect($this->finder->find($lonely, $this->tree['me']))->toBeNull();
});

/**
 * @param  list<int>  $spouseIds
 */
function setRawSpouseIds(Family $member, array $spouseIds): void
{
    Illuminate\Support\Facades\DB::table('families')->where('id', $member->id)->update(['spouse' => json_encode($spouseIds)]);
}
