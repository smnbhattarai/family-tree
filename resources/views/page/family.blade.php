@extends('layouts.app', [
    'pageTitle' => __('Family Tree')
])

@section('mainClass', 'ft-main--flush')
@section('containerClass', 'container-fluid')

@section('main_content')

    @if($mainId === null)
        <div class="container py-5">
            <div class="ft-empty">
                <i class="bi bi-tree"></i>
                <p class="mt-2">{{ __('No family members have been added yet.') }}</p>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.family.create') }}" class="btn btn-primary"><i class="bi bi-person-plus me-1"></i> {{ __('Add the first member') }}</a>
                @endif
            </div>
        </div>
    @else
        <div class="ft-chart-shell">
            <div id="FamilyChart" class="f3" style="width:100%;height:500px;"></div>
        </div>
    @endif

@endsection

@section('footerScript')
    @if($mainId !== null)
    <script>

        const data = {!! $data !!}

        document.addEventListener("DOMContentLoaded", function () {

            document.querySelector("#FamilyChart").style.height = Math.floor(window.innerHeight - 150) + 'px';

            // Create the chart
            const chart = f3.createChart('#FamilyChart', data)
                .setTransitionTime(1000)
                .setCardXSpacing(250)
                .setCardYSpacing(150)
                .setSortChildrenFunction((a, b) => a.data.gender === b.data.gender ? 0 : a.data.gender === 'M' ? 1 : -1)

            chart.setCardHtml()
                .setCardDisplay([["label"]])
                .setOnCardUpdate(function (d) {
                    d3.select(this).select('.card').style('cursor', 'default')
                    const card = this.querySelector('.card-inner')
                    d3.select(card)
                        .append('a')
                        .attr('href', 'family/' + d.data.id)
                        .attr('target', '_blank')
                        .attr('style', 'cursor: pointer; width: 14px; height: 14px;position: absolute; top: 4px; right: 4px; color:white')
                        .html(f3.icons.infoSvgIcon())
                        .select('svg')
                        .style('padding', '0')
                });

            chart.updateMainId({{ $mainId }})

            chart.updateTree({initial: true});

            setTimeout(() => {
                const tree = chart.store.getTree();
                const datum = tree.data[0]
                f3.handlers.cardToMiddle({
                    datum,
                    svg: chart.svg,
                    svg_dim: chart.svg.getBoundingClientRect(),
                    transition_time: 2000
                })
            }, 4000)

            // setup search dropdown
            // this is basic showcase, please use some autocomplete component and style it as you want
            const all_select_options = []
            data.forEach(d => {
                if (all_select_options.find(d0 => d0.value === d["id"])) return
                all_select_options.push({label: `${d.data["label"]}`, value: d["id"]})
            })
            const search_cont = d3.select(document.querySelector("#FamilyChart")).append("div")
                .attr("class", "ft-chart-search")
                .on("focusout", () => {
                    setTimeout(() => {
                        if (!search_cont.node().contains(document.activeElement)) {
                            updateDropdown([]);
                        }
                    }, 200);
                })

            const search_input = search_cont.append("input")
                .attr("type", "search")
                .attr("placeholder", "{{ __('Find someone in the tree...') }}")
                .on("focus", activateDropdown)
                .on("input", activateDropdown)

            const dropdown = search_cont.append("div").attr("class", "ft-chart-results")
                .attr("tabindex", "0")
                .on("wheel", (e) => {
                    e.stopPropagation()
                })

            function activateDropdown() {
                const search_input_value = search_input.property("value")
                const filtered_options = all_select_options.filter(d => d.label.toLowerCase().includes(search_input_value.toLowerCase()))
                updateDropdown(filtered_options)
            }

            function updateDropdown(filtered_options) {
                dropdown.selectAll("div").data(filtered_options).join("div")
                    .on("click", (e, d) => {
                        updateTreeWithNewMainPerson(d.value, true)
                    })
                    .text(d => d.label)
            }

            // with person_id this function will update the tree
            function updateTreeWithNewMainPerson(person_id, animation_initial = true) {
                chart.updateMainId(person_id)
                chart.updateTree({initial: animation_initial})

                const url = new URL(window.location.href)
                url.searchParams.set('focus', person_id)
                window.history.replaceState(null, '', url)
            }
        });

    </script>
    @endif
@endsection
