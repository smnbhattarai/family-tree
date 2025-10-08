@extends('layouts.app', [
    'pageTitle' => __('Family Tree')
])

@section('main_content')

    <div class="row">

        <div class="col-md-12">

            <div id="FamilyChart" class="f3" style="width:100%;height:500px;"></div>

        </div>

    </div>

@endsection

@section('footerScript')
    <script>
        // Your family tree data
        const data = [{
            "id": "Q508525",
            "data": {
                "fn": "Mary",
                "ln": "Soames",
                "desc": "British aristocrat, daughter of Winston Churchill and his wife Clementine (1922–2014)",
                "label": "Mary Soames",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/69/Mary_Soames_%281965%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q8016",
                "mother": "Q263454",
                "spouses": ["Q336050"],
                "children": ["Q390192", "Q3052477", "Q3453283", "Q13408312", "Q75386090"]
            },
            "main": false
        }, {
            "id": "Q13408289",
            "data": {
                "fn": "Marigold Frances",
                "ln": "Churchill",
                "desc": "daughter of Sir Winston Leonard Spencer-Churchill",
                "label": "Marigold Churchill",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q8016", "mother": "Q263454", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2405785",
            "data": {
                "fn": "Sarah",
                "ln": "Churchill",
                "desc": "British actress and dancer (1914-1982)",
                "label": "Sarah Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/68/Sarah_Churchill_in_Royal_Wedding.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q8016",
                "mother": "Q263454",
                "spouses": ["Q3557487", "Q3133116", "Q75386076"],
                "children": []
            },
            "main": false
        }, {
            "id": "Q183105",
            "data": {
                "fn": "Randolph",
                "ln": "Churchill",
                "desc": "British politician, son of British Prime Minister Winston Churchill (1911-1968)",
                "label": "Randolph Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/f9/Cecil_Beaton_Photographs-_Political_and_Military_Personalities%3B_Churchill%2C_Randolph_Frederick_Edward_Spencer_CBM1585.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q8016",
                "mother": "Q263454",
                "spouses": ["Q2723519", "Q75386006"],
                "children": ["Q332528", "Q2859344"]
            },
            "main": false
        }, {
            "id": "Q5271122",
            "data": {
                "fn": "Diana",
                "ln": "Churchill",
                "desc": "daughter of Sir Winston Churchill (1909-1963)",
                "label": "Diana Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6c/Diana_Churchill_publ.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q8016",
                "mother": "Q263454",
                "spouses": ["Q203129", "Q75386025"],
                "children": ["Q75386034", "Q5346952", "Q75386057"]
            },
            "main": false
        }, {
            "id": "Q263454",
            "data": {
                "fn": "Clementine",
                "ln": "Hozier",
                "desc": "Wife of Winston Churchill and life peer (1885–1977)",
                "label": "Clementine Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fc/Clementine_Churchill_1915.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q2004836",
                "mother": "Q42083828",
                "spouses": ["Q8016"],
                "children": ["Q183105", "Q13408289", "Q508525", "Q5271122", "Q2405785"]
            },
            "main": false
        }, {
            "id": "Q243011",
            "data": {
                "fn": "Jeanette",
                "ln": "Jerome Churchill",
                "desc": "American-born British mother of Winston Churchill (1854–1921)",
                "label": "Lady Randolph Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/65/Lady_Randolph_Churchill%2C_by_Herbert_Rose_Barraud.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q1819011",
                "mother": "Q61750828",
                "spouses": ["Q314773", "Q1465068", "Q35160543"],
                "children": ["Q8016", "Q721915"]
            },
            "main": false
        }, {
            "id": "Q314773",
            "data": {
                "fn": "Randolph Henry",
                "ln": "Churchill Spencer-Churchill",
                "desc": "British politician, father of Winston Churchill (1849-1895)",
                "label": "Lord Randolph Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/86/Lord_Randolph_Churchill.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q333355",
                "mother": "Q3749340",
                "spouses": ["Q243011"],
                "children": ["Q8016", "Q721915"]
            },
            "main": false
        }, {
            "id": "Q8016",
            "data": {
                "fn": "Winston Leonard",
                "ln": "Spencer-Churchill Churchill",
                "desc": "British statesman, soldier and writer (1874–1965)",
                "label": "Winston Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bc/Sir_Winston_Churchill_-_19086236948.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q314773",
                "mother": "Q243011",
                "spouses": ["Q263454"],
                "children": ["Q5271122", "Q183105", "Q2405785", "Q13408289", "Q508525"]
            },
            "main": true
        }, {
            "id": "Q152316",
            "data": {
                "fn": "Henry Charles Albert David",
                "ln": "Wales Windsor",
                "desc": "younger son of Charles III of the United Kingdom and Diana, Princess of Wales",
                "label": "Prince Harry, Duke of Sussex",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0e/Prince_Harry%2C_Duke_of_Sussex_2020_cropped_02.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q43274",
                "mother": "Q9685",
                "spouses": ["Q3304418"],
                "children": ["Q62938826", "Q107125551"]
            },
            "main": false
        }, {
            "id": "Q36812",
            "data": {
                "fn": "William Arthur Philip Louis",
                "ln": "Windsor",
                "desc": "heir apparent to the throne of the United Kingdom and 14 Commonwealth Realms",
                "label": "William, Prince of Wales",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/df/Prince_of_Wales_in_Normandy_2024.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q43274",
                "mother": "Q9685",
                "spouses": ["Q10479"],
                "children": ["Q13590412", "Q18002970", "Q38668629"]
            },
            "main": false
        }, {
            "id": "Q152239",
            "data": {
                "fn": "Camilla Rosemary",
                "ln": "Shand Parker Bowles Windsor",
                "desc": "Queen Consort of the United Kingdom since 2022",
                "label": "Queen Camilla",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c9/Queen_Camilla_in_Aotearoa_2019.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q327457",
                "mother": "Q17363684",
                "spouses": ["Q2221868", "Q43274"],
                "children": ["Q3736070", "Q3743314"]
            },
            "main": false
        }, {
            "id": "Q9685",
            "data": {
                "fn": "Diana Frances",
                "ln": "Spencer Mountbatten-Windsor",
                "desc": "member of the British royal family and Princess of Wales (1961–1997)",
                "label": "Diana, Princess of Wales",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/f3/Diana%2C_Princess_of_Wales_1997_%282%29_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q593671",
                "mother": "Q256893",
                "spouses": ["Q43274"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q9682",
            "data": {
                "fn": "Elizabeth Alexandra Mary",
                "ln": "Windsor",
                "desc": "Queen of the United Kingdom from 1952 to 2022",
                "label": "Elizabeth II",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b6/Queen_Elizabeth_II_in_March_2015.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q280856",
                "mother": "Q10633",
                "spouses": ["Q80976"],
                "children": ["Q43274", "Q151754", "Q153330", "Q154920"]
            },
            "main": false
        }, {
            "id": "Q80976",
            "data": {
                "fn": "Philip",
                "ln": "Mountbatten",
                "desc": "consort of Elizabeth II from 1952 to 2021",
                "label": "Prince Philip, Duke of Edinburgh",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e2/Duke_of_Edinburgh_33_Allan_Warren.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q156531",
                "mother": "Q116062",
                "spouses": ["Q9682"],
                "children": ["Q43274", "Q151754", "Q153330", "Q154920"]
            },
            "main": false
        }, {
            "id": "Q43274",
            "data": {
                "fn": "Charles Philip Arthur George",
                "ln": "Mountbatten-Windsor",
                "desc": "King of the United Kingdom and other Commonwealth realms since 2022",
                "label": "Charles III",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ac/King_Charles_III_%28July_2023%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q80976",
                "mother": "Q9682",
                "spouses": ["Q9685", "Q152239"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q122374054",
            "data": {
                "fn": "",
                "ln": "Musck",
                "desc": "son of Elon Musk and Grimes",
                "label": "Tau Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q317521", "mother": "Q117970", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q111204042",
            "data": {
                "fn": "Exa Dark Sideræl",
                "ln": "Musck",
                "desc": "daughter of Elon Musk and Grimes",
                "label": "Exa Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q317521", "mother": "Q117970", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q122374852",
            "data": {
                "fn": "",
                "ln": "Musck",
                "desc": "daughter of Elon Musk and Shivon Zilis",
                "label": "Azure Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q317521", "mother": "Q112957545", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q122374820",
            "data": {
                "fn": "",
                "ln": "Musck",
                "desc": "son of Elon Musk and Shivon Zilis",
                "label": "Strider Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q317521", "mother": "Q112957545", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q93418989",
            "data": {
                "fn": "X Æ A-Ⅻ",
                "ln": "Musck",
                "desc": "child of Grimes and Elon Musk",
                "label": "X Æ A-Ⅻ Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q317521", "mother": "Q117970", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q97572429",
            "data": {
                "fn": "Kai",
                "ln": "Musck",
                "desc": "son of Elon Musk",
                "label": "Kai Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q317521", "mother": "Q6318376", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q101675036",
            "data": {
                "fn": "John Saxon",
                "ln": "Musck",
                "desc": "son of Elon Musk",
                "label": "Saxon Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q317521", "mother": "Q6318376", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q101675234",
            "data": {
                "fn": "Damian",
                "ln": "Musck",
                "desc": "son of Elon Musk",
                "label": "Damian Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q317521", "mother": "Q6318376", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q95724881",
            "data": {
                "fn": "Griffin",
                "ln": "Musck",
                "desc": "son of Elon Musk",
                "label": "Griffin Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q317521", "mother": "Q6318376", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q101674980",
            "data": {
                "fn": "Vivian Jenna",
                "ln": "Wilson",
                "desc": "American student and daughter of Elon Musk (born 2004)",
                "label": "Vivian Jenna Wilson",
                "avatar": null
            },
            "rels": {"father": "Q317521", "mother": "Q6318376", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q109731214",
            "data": {
                "fn": "Nevada Alexander",
                "ln": "Musck",
                "desc": "first son of Elon Musk",
                "label": "Nevada Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q317521", "mother": "Q6318376", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q35723119",
            "data": {
                "fn": "Errol",
                "ln": "Nissen",
                "desc": "South African electromechanical engineer",
                "label": "Errol Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q101676766",
                "mother": "Q101676922",
                "spouses": ["Q24007468", "Q104721250", "fb0668dd-f150-4994-8ecf-8191ac40c03f"],
                "children": ["Q317521", "Q7827568", "Q6409751", "Q111363577", "Q105538968", "Q104721244"]
            },
            "main": false
        }, {
            "id": "Q24007468",
            "data": {
                "fn": "Maye",
                "ln": "Musck",
                "desc": "Canadian-South African model and dietitian",
                "label": "Maye Musk",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/42/Maye-Musk.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q101676127",
                "mother": "Q101676386",
                "spouses": ["Q35723119"],
                "children": ["Q317521", "Q7827568", "Q6409751"]
            },
            "main": false
        }, {
            "id": "Q269309",
            "data": {
                "fn": "Talulah",
                "ln": "Riley",
                "desc": "British actress",
                "label": "Talulah Riley",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/07/TalulahRileyAug09_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q317521"], "children": []},
            "main": false
        }, {
            "id": "Q6318376",
            "data": {
                "fn": "Justine",
                "ln": "Wilson",
                "desc": "Canadian writer (born 1972)",
                "label": "Justine Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q317521"],
                "children": ["Q95724881", "Q97572429", "Q101675036", "Q101675234", "Q101674980", "Q109731214"]
            },
            "main": false
        }, {
            "id": "Q317521",
            "data": {
                "fn": "Elon Reeven",
                "ln": "Musck",
                "desc": "South African-born businessman & Tesla, SpaceX CEO",
                "label": "Elon Musk",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/34/Elon_Musk_Royal_Society_%28crop2%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q35723119",
                "mother": "Q24007468",
                "spouses": ["Q6318376", "Q269309", "Q117970", "Q112957545"],
                "children": ["Q109731214", "Q101674980", "Q95724881", "Q101675234", "Q101675036", "Q97572429", "Q93418989", "Q111204042", "Q122374054", "Q122374820", "Q122374852"]
            },
            "main": false
        }, {
            "id": "Q97748633",
            "data": {
                "fn": "Miguel Ángel",
                "ln": "Bezos",
                "desc": "Cuba-born engineer (1944-2015)",
                "label": "Miguel Bezos",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q92464290"], "children": ["Q23784752"]},
            "main": false
        }, {
            "id": "Q97749941",
            "data": {
                "fn": "Ted",
                "ln": "Jorgensen",
                "desc": "American unicycle hockey player & biological father of Jeff Bezos (1944-2015)",
                "label": "Ted Jorgensen",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q92464290"], "children": ["Q312556"]},
            "main": false
        }, {
            "id": "Q102433555",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "son of Jeff Bezos",
                "label": "third son of Jeff Bezos",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q312556", "mother": "Q10322797", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q102433548",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "son of Jeff Bezos",
                "label": "second son of Jeff Bezos",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q312556", "mother": "Q10322797", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q102433534",
            "data": {
                "fn": "Preston",
                "ln": "Bezos",
                "desc": "first son of Jeff Bezos",
                "label": "Preston Bezos",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q312556", "mother": "Q10322797", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q92464290",
            "data": {
                "fn": "Jacklyn",
                "ln": "",
                "desc": "American billionaire",
                "label": "Jacklyn Gise",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q97748633", "Q97749941"], "children": ["Q312556", "Q23784752"]},
            "main": false
        }, {
            "id": "Q10322797",
            "data": {
                "fn": "MacKenzie S.",
                "ln": "Tuttle Bezos Tuttle Scott",
                "desc": "American philanthropist and novelist",
                "label": "MacKenzie Scott",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/16/MacKenzie_Scott.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q312556", "Q5213754"], "children": ["Q102433534", "Q102433548", "Q102433555"]},
            "main": false
        }, {
            "id": "Q312556",
            "data": {
                "fn": "Jeffrey Preston",
                "ln": "Jorgensen Bezos",
                "desc": "American business magnate (born 1964)",
                "label": "Jeff Bezos",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6c/Jeff_Bezos_at_Amazon_Spheres_Grand_Opening_in_Seattle_-_2018_%2839074799225%29_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q97749941",
                "mother": "Q92464290",
                "spouses": ["Q10322797"],
                "children": ["Q102433534", "Q102433548", "Q102433555"]
            },
            "main": false
        }, {
            "id": "Q56222319",
            "data": {
                "fn": "Doris",
                "ln": "Buffett",
                "desc": "American philanthropist",
                "label": "Doris Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/34/Doris_Buffett_visits_Gladys_P._Todd_Academy_students%2C_mentors_%2823622779750%29.jpg",
                "gender": "F"
            },
            "rels": {"mother": "Q55979202", "spouses": [], "children": [], "father": "Q723488"},
            "main": false
        }, {
            "id": "Q5921204",
            "data": {
                "fn": "Howard",
                "ln": "Buffett",
                "desc": "American academic",
                "label": "Howard Warren Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3f/Howard_Warren_Buffett.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q4079744",
                "spouses": [],
                "children": [],
                "mother": "ed8458d6-85ce-43b4-96ba-5e8d59772c36"
            },
            "main": false
        }, {
            "id": "Q723488",
            "data": {
                "fn": "Howard",
                "ln": "Buffett",
                "desc": "United States Representative from Nebraska (1903-1964)",
                "label": "Howard Homan Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3d/Howard_Buffett.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q96219123",
                "mother": "Q96219134",
                "spouses": ["Q55979202", "4a0ba51f-7d19-4010-bfb5-5af247a3d4a9"],
                "children": ["Q47213", "Q56222319", "Q102197117"]
            },
            "main": false
        }, {
            "id": "Q96219123",
            "data": {
                "fn": "Ernest",
                "ln": "Buffett",
                "desc": "3 Feb 1877 in Nebraska -",
                "label": "Ernest Platt Buffett",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q96219134"], "children": ["Q723488"]},
            "main": false
        }, {
            "id": "Q96219134",
            "data": {
                "fn": "Henrietta",
                "ln": "",
                "desc": "Jul 1870 in West Virginia - Abt 1920/1930",
                "label": "Henrietta Duval",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q96219123"], "children": ["Q723488"]},
            "main": false
        }, {
            "id": "Q102197117",
            "data": {
                "fn": "Roberta",
                "ln": "",
                "desc": "American philanthropist",
                "label": "Roberta Buffett Elliott",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": [],
                "children": [],
                "father": "Q723488",
                "mother": "4a0ba51f-7d19-4010-bfb5-5af247a3d4a9"
            },
            "main": false
        }, {
            "id": "Q4079744",
            "data": {
                "fn": "Howard Graham",
                "ln": "Buffett",
                "desc": "American photographer and philanthropist",
                "label": "Howard Graham Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2f/Howard_Graham_Buffett.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q47213",
                "mother": "Q7647630",
                "spouses": ["ed8458d6-85ce-43b4-96ba-5e8d59772c36"],
                "children": ["Q5921204"]
            },
            "main": false
        }, {
            "id": "Q56222319",
            "data": {
                "fn": "Doris",
                "ln": "Buffett",
                "desc": "American philanthropist",
                "label": "Doris Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/34/Doris_Buffett_visits_Gladys_P._Todd_Academy_students%2C_mentors_%2823622779750%29.jpg",
                "gender": "F"
            },
            "rels": {"mother": "Q55979202", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q102197014",
            "data": {
                "fn": "",
                "ln": "Buffett",
                "desc": "no description",
                "label": "Mary Buffett",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q102196932",
            "data": {
                "fn": "Nicole",
                "ln": "",
                "desc": "no description",
                "label": "Nicole Buffet",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": [],
                "children": [],
                "father": "Q7173047",
                "mother": "dc648427-943f-4053-bd88-3e6284e40962"
            },
            "main": false
        }, {
            "id": "Q102196997",
            "data": {
                "fn": "Jennifer",
                "ln": "Buffett",
                "desc": "no description",
                "label": "Jennifer Buffett",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q7173047",
            "data": {
                "fn": "Peter",
                "ln": "Buffett",
                "desc": "American musician and writer",
                "label": "Peter Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/7f/Peter-buffet.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q47213",
                "mother": "Q7647630",
                "spouses": ["Q102196997", "Q102197014", "dc648427-943f-4053-bd88-3e6284e40962"],
                "children": ["Q102196932"]
            },
            "main": false
        }, {
            "id": "Q96219137",
            "data": {
                "fn": "Stella",
                "ln": "Barber",
                "desc": "Dec 1873 - 1960",
                "label": "Stella Frances Barber",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q96219136"], "children": ["Q55979202"]},
            "main": false
        }, {
            "id": "Q96219136",
            "data": {
                "fn": "John",
                "ln": "Stahl",
                "desc": "Jan 1867 Selinsgrove, Pennsylkvania - 1940 West Point, New England",
                "label": "John Ammon Stahl",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q96219137"], "children": ["Q55979202"]},
            "main": false
        }, {
            "id": "Q7647630",
            "data": {
                "fn": "Susan",
                "ln": "Buffett",
                "desc": "American activist (1932-2004)",
                "label": "Susan Buffett",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q47213"], "children": ["Q4079744", "Q7173047", "Q7647504"]},
            "main": false
        }, {
            "id": "Q55979202",
            "data": {
                "fn": "Leila",
                "ln": "Buffett",
                "desc": "Warren Buffet's mother",
                "label": "Leila Stahl Buffett",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q96219136",
                "mother": "Q96219137",
                "spouses": ["Q723488"],
                "children": ["Q47213", "Q56222319"]
            },
            "main": false
        }, {
            "id": "Q47213",
            "data": {
                "fn": "Warren Edward",
                "ln": "Buffett",
                "desc": "American investor, entrepreneur and businessman",
                "label": "Warren Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/51/Warren_Buffett_KU_Visit.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q723488",
                "mother": "Q55979202",
                "spouses": ["Q7647630", "Q96756817"],
                "children": ["Q4079744", "Q7647504", "Q7173047"]
            },
            "main": false
        }, {
            "id": "Q723488",
            "data": {
                "fn": "Howard",
                "ln": "Buffett",
                "desc": "United States Representative from Nebraska (1903-1964)",
                "label": "Howard Homan Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3d/Howard_Buffett.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q96219123",
                "mother": "Q96219134",
                "spouses": ["Q55979202"],
                "children": ["Q102197117", "Q47213", "Q56222319"]
            },
            "main": false
        }, {
            "id": "Q7647630",
            "data": {
                "fn": "Susan",
                "ln": "Buffett",
                "desc": "American activist (1932-2004)",
                "label": "Susan Buffett",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q47213"], "children": ["Q4079744", "Q7173047", "Q7647504"]},
            "main": false
        }, {
            "id": "Q7173047",
            "data": {
                "fn": "Peter",
                "ln": "Buffett",
                "desc": "American musician and writer",
                "label": "Peter Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/7f/Peter-buffet.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q47213",
                "mother": "Q7647630",
                "spouses": ["Q102196997", "Q102197014"],
                "children": ["Q102196932"]
            },
            "main": false
        }, {
            "id": "Q4079744",
            "data": {
                "fn": "Howard Graham",
                "ln": "Buffett",
                "desc": "American photographer and philanthropist",
                "label": "Howard Graham Buffett",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2f/Howard_Graham_Buffett.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q47213", "mother": "Q7647630", "spouses": [], "children": ["Q5921204"]},
            "main": false
        }, {
            "id": "Q7647504",
            "data": {
                "fn": "Susan",
                "ln": "Buffett",
                "desc": "American philanthropist",
                "label": "Susan Alice Buffett",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q47213", "mother": "Q7647630", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q96756817",
            "data": {
                "fn": "Astrid",
                "ln": "no label",
                "desc": "second wife of Warren Buffett",
                "label": "Astrid Menks",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q684014",
            "data": {
                "fn": "William Henry",
                "ln": "Gates",
                "desc": "American attorney and philanthropist (1925–2020)",
                "label": "Bill Gates Sr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b7/William-H-Gates-Senior-New-Delhi-Hi-Res.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q96201178",
                "mother": "Q96201192",
                "spouses": ["Q454928", "Q6862133"],
                "children": ["Q5284", "Q92466067", "Q92466304"]
            },
            "main": false
        }, {
            "id": "Q23011257",
            "data": {
                "fn": "John",
                "ln": "Gates",
                "desc": "son of Bill and Melinda Gates",
                "label": "Rory John Gates",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q5284", "mother": "Q463877", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23011256",
            "data": {
                "fn": "Phoebe Adele",
                "ln": "",
                "desc": "daughter of Bill and Melinda Gates",
                "label": "Phoebe Adele Gates",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q5284", "mother": "Q463877", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23011254",
            "data": {
                "fn": "Jennifer Katherine",
                "ln": "Gates",
                "desc": "show jumper, Melinda and Bill Gates' eldest child",
                "label": "Jennifer Katherine Gates",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/92/Jennifer_Gates_-_Pumped_Up_Kicks_-_Championat_von_Hamburg_2019.JPG",
                "gender": "F"
            },
            "rels": {"father": "Q5284", "mother": "Q463877", "spouses": ["Q84766147"], "children": []},
            "main": false
        }, {
            "id": "Q463877",
            "data": {
                "fn": "Melinda Ann",
                "ln": "Gates French",
                "desc": "American philanthropist",
                "label": "Melinda Gates",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ec/Melinda_Gates_-_World_Economic_Forum_Annual_Meeting_2011.jpg",
                "gender": "F"
            },
            "rels": {
                "mother": "Q106695809",
                "spouses": ["Q5284"],
                "children": ["Q23011254", "Q23011256", "Q23011257"],
                "father": "8c0b3f32-bf5f-4589-990a-248f459291c3"
            },
            "main": false
        }, {
            "id": "Q454928",
            "data": {
                "fn": "Mary",
                "ln": "",
                "desc": "American businesswoman (1929–1994)",
                "label": "Mary Maxwell Gates",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q96201199",
                "mother": "Q96201224",
                "spouses": ["Q684014"],
                "children": ["Q5284", "Q92466304", "Q92466067"]
            },
            "main": false
        }, {
            "id": "Q5284",
            "data": {
                "fn": "William Henry",
                "ln": "Gates",
                "desc": "American businessman, investor, and philanthropist (born 1955)",
                "label": "Bill Gates",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fc/Bill_Gates_-_2023_-_P062021-967902_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q684014",
                "mother": "Q454928",
                "spouses": ["Q463877"],
                "children": ["Q23011254", "Q23011256", "Q23011257"]
            },
            "main": false
        }, {
            "id": "Q28941744",
            "data": {
                "fn": "Joanne Carole",
                "ln": "Schieble Simpson",
                "desc": "American speech therapist. Steve Jobs' biologic mother",
                "label": "Joanne Carole Schieble Simpson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q12605967"], "children": ["Q19837", "Q238331"]},
            "main": false
        }, {
            "id": "Q12605967",
            "data": {
                "fn": "ʻAbd al-Fattāḥ",
                "ln": "",
                "desc": "Steve Jobs' biological father",
                "label": "Abdulfattah Jandali",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q28941744"], "children": ["Q19837", "Q238331"]},
            "main": false
        }, {
            "id": "Q3133593",
            "data": {
                "fn": "Laurene",
                "ln": "Jobs Powell",
                "desc": "American political activist, business executive, philanthropist, heiress, billionaire",
                "label": "Laurene Powell Jobs",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/97/Laurene_Powell_Jobs.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q19837"], "children": ["Q20895861", "Q20895866", "Q20895867"]},
            "main": false
        }, {
            "id": "Q20895867",
            "data": {
                "fn": "Eve",
                "ln": "Jobs",
                "desc": "daughter of Steve Jobs and Laurene Powell Jobs",
                "label": "Eve Jobs",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/ff/Eve_Jobs_Venue_d_Fees_des_Hazalles_-_GCL_Hamburg_2021.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q19837", "mother": "Q3133593", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q20895866",
            "data": {
                "fn": "Erin Sienna",
                "ln": "",
                "desc": "daughter of Steve Jobs and Laurene Powell Jobs",
                "label": "Erin Sienna",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q19837", "mother": "Q3133593", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q20895861",
            "data": {
                "fn": "Reed",
                "ln": "Paul",
                "desc": "son of Steve Jobs and Laurene Powell Jobs",
                "label": "Reed Paul",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q19837", "mother": "Q3133593", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2983236",
            "data": {
                "fn": "Lisa",
                "ln": "",
                "desc": "American writer",
                "label": "Lisa Brennan-Jobs",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b0/Lisa_Brennan-Jobs.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q19837", "mother": "Q18810921", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q19837",
            "data": {
                "fn": "Steven Paul Steve",
                "ln": "Jobs",
                "desc": "American entrepreneur; co-founder of Apple Inc. (1955–2011)",
                "label": "Steve Jobs",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/f5/Steve_Jobs_Headshot_2010-CROP2.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q12605967",
                "mother": "Q28941744",
                "spouses": ["Q3133593", "Q18810921"],
                "children": ["Q20895861", "Q20895866", "Q20895867", "Q2983236"]
            },
            "main": false
        }, {
            "id": "Q29348175",
            "data": {
                "fn": "Deloris",
                "ln": "Peoples Jordan",
                "desc": "American banker, mother of basketball player Michael Jordan",
                "label": "Deloris Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q3161193"],
                "children": ["Q41421", "Q55819312", "Q55819493", "Q55819653", "Q55820302"]
            },
            "main": false
        }, {
            "id": "Q26220958",
            "data": {
                "fn": "Juanita",
                "ln": "Vanoy",
                "desc": "first wife of basketball player Michael Jordan",
                "label": "Juanita Vanoy",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q41421"], "children": ["Q6176081", "Q6758256"]},
            "main": false
        }, {
            "id": "Q26220952",
            "data": {
                "fn": "Yvette",
                "ln": "",
                "desc": "Model; second wife of basketball player Michael Jordan",
                "label": "Yvette Prieto",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q41421"], "children": ["Q26220954", "Q26220955"]},
            "main": false
        }, {
            "id": "Q107325744",
            "data": {
                "fn": "Jasmine",
                "ln": "Jordan",
                "desc": "no description",
                "label": "Jasmine M. Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": [],
                "children": [],
                "father": "Q41421",
                "mother": "fc3b4929-b8e3-4c3a-9af0-e6687cc0e47d"
            },
            "main": false
        }, {
            "id": "Q26220955",
            "data": {
                "fn": "Victoria",
                "ln": "Jordan",
                "desc": "no description",
                "label": "Victoria Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q41421", "mother": "Q26220952", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q26220954",
            "data": {
                "fn": "",
                "ln": "Jordan",
                "desc": "no description",
                "label": "Ysabel Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q41421", "mother": "Q26220952", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6758256",
            "data": {
                "fn": "Marcus",
                "ln": "Jordan",
                "desc": "American basketball player; son of basketball player Michael Jordan",
                "label": "Marcus Jordan",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q41421", "mother": "Q26220958", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6176081",
            "data": {
                "fn": "Jeffrey",
                "ln": "Jordan",
                "desc": "American college basketball player, one of the sons of basketball player Michael Jordan",
                "label": "Jeffrey Jordan",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fb/Jeffrey_Jordan_Illinois.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q41421", "mother": "Q26220958", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3161193",
            "data": {
                "fn": "James",
                "ln": "Jordan",
                "desc": "murder victim, father of basketball player Michael Jordan (1936-1993)",
                "label": "James R. Jordan, Sr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q107325452",
                "mother": "Q107325453",
                "spouses": ["Q29348175"],
                "children": ["Q41421", "Q55819312", "Q55819493", "Q55819653", "Q55820302"]
            },
            "main": false
        }, {
            "id": "Q41421",
            "data": {
                "fn": "Michael Jeffrey",
                "ln": "Jordan",
                "desc": "American basketball player and businessman (born 1963)",
                "label": "Michael Jordan",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/88/Michael_Jordan.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q3161193",
                "mother": "Q29348175",
                "spouses": ["Q26220952", "Q26220958", "fc3b4929-b8e3-4c3a-9af0-e6687cc0e47d"],
                "children": ["Q26220954", "Q26220955", "Q6176081", "Q6758256", "Q107325744"]
            },
            "main": false
        }, {
            "id": "Q5195707",
            "data": {
                "fn": "Curtis",
                "ln": "Conway",
                "desc": "American football player",
                "label": "Curtis Conway",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/d1/Curtis_Conway_by_Gage_Skidmore.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q255099"], "children": []},
            "main": false
        }, {
            "id": "Q255099",
            "data": {
                "fn": "Laila Amaria",
                "ln": "Ali",
                "desc": "American television personality and retired professional boxer",
                "label": "Laila Ali",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/d3/Laila_Ali_by_Gage_Skidmore.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q36107", "mother": "Q7922443", "spouses": ["Q5195707"], "children": []},
            "main": false
        }, {
            "id": "Q7922443",
            "data": {
                "fn": "Veronica",
                "ln": "Porche Ali",
                "desc": "Third wife of Muhammad Ali",
                "label": "Veronica Porché Ali",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bb/Muhammad_Ali_and_Jimmy_Carter.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q36107", "Q969468"], "children": ["Q255099", "Q15727320"]},
            "main": false
        }, {
            "id": "Q969468",
            "data": {
                "fn": "Carl Carlton Earl",
                "ln": "Anderson",
                "desc": "American singer, film and theatre actor (1945–2004)",
                "label": "Carl Anderson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q7922443"], "children": []},
            "main": false
        }, {
            "id": "Q19864411",
            "data": {
                "fn": "Belinda Khalilah",
                "ln": "Boyd Ali Camacho",
                "desc": "second wife of boxer Muhammad Ali",
                "label": "Khalilah Ali",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q36107"], "children": ["Q24293161", "Q24293017", "Q124377161"]},
            "main": false
        }, {
            "id": "Q6284282",
            "data": {
                "fn": "Rahman Rudolph Valentino",
                "ln": "Ali Clay",
                "desc": "American former heavyweight boxer",
                "label": "Rahman Ali",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q5049496", "mother": "Q6282262", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6284282",
            "data": {
                "fn": "Rahman Rudolph Valentino",
                "ln": "Ali Clay",
                "desc": "American former heavyweight boxer",
                "label": "Rahman Ali",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q5049496", "mother": "Q6282262", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q19864411",
            "data": {
                "fn": "Belinda Khalilah",
                "ln": "Boyd Ali Camacho",
                "desc": "second wife of boxer Muhammad Ali",
                "label": "Khalilah Ali",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q36107"], "children": ["Q24293161", "Q24293017", "Q124377161"]},
            "main": false
        }, {
            "id": "Q6282262",
            "data": {
                "fn": "Odessa",
                "ln": "Clay",
                "desc": "mother of boxer Muhammad Ali (1917-1994)",
                "label": "Odessa Grady Clay",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q96235809",
                "mother": "Q96235813",
                "spouses": ["Q5049496"],
                "children": ["Q36107", "Q6284282"]
            },
            "main": false
        }, {
            "id": "Q96235809",
            "data": {
                "fn": "John",
                "ln": "Grady",
                "desc": "grandfather of Muhammad Ali (1886-1965)",
                "label": "John Grady",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q96235813"], "children": ["Q6282262"]},
            "main": false
        }, {
            "id": "Q124377161",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "daughter of boxer Muhammad Ali",
                "label": "Rasheda Ali",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q36107", "mother": "Q19864411", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q24293017",
            "data": {
                "fn": "Maryum",
                "ln": "Ali",
                "desc": "American writer, actor and stand-up comedian",
                "label": "Maryum Ali",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q36107", "mother": "Q19864411", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q24293161",
            "data": {
                "fn": "Muhammad",
                "ln": "Ali",
                "desc": "son of Muhammad Ali",
                "label": "Muhammad Ali Jr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q36107", "mother": "Q19864411", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q36107",
            "data": {
                "fn": "Muhammad Cassius Marcellus",
                "ln": "Ali Clay",
                "desc": "American boxer, philanthropist, and activist (1942–2016)",
                "label": "Muhammad Ali",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/89/Muhammad_Ali_NYWTS.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q5049496",
                "mother": "Q6282262",
                "spouses": ["Q22941605", "Q19864411", "Q7922443", "Q22941637"],
                "children": ["Q24293017", "Q24293161", "Q124377161", "Q15727320", "Q255099"]
            },
            "main": false
        }, {
            "id": "Q19864411",
            "data": {
                "fn": "Belinda Khalilah",
                "ln": "Boyd Ali Camacho",
                "desc": "second wife of boxer Muhammad Ali",
                "label": "Khalilah Ali",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q36107"], "children": ["Q24293161", "Q24293017", "Q124377161"]},
            "main": false
        }, {
            "id": "Q96235813",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "grandmother of Muhammad Ali (189_-1944)",
                "label": "Birdie Morehead",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q96235809"], "children": ["Q6282262"]},
            "main": false
        }, {
            "id": "Q96631280",
            "data": {
                "fn": "Edith",
                "ln": "Clay",
                "desc": "(26 Dec 1890 - 30 Dec 1971)",
                "label": "Edith E. Clay",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q107334783"], "children": ["Q5049496"]},
            "main": false
        }, {
            "id": "Q107334783",
            "data": {
                "fn": "Herman",
                "ln": "Clay",
                "desc": "(1876-1954)",
                "label": "Herman H. Clay",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q96631280"], "children": ["Q5049496"]},
            "main": false
        }, {
            "id": "Q19864411",
            "data": {
                "fn": "Belinda Khalilah",
                "ln": "Boyd Ali Camacho",
                "desc": "second wife of boxer Muhammad Ali",
                "label": "Khalilah Ali",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q36107"], "children": ["Q24293161", "Q24293017", "Q124377161"]},
            "main": false
        }, {
            "id": "Q7922443",
            "data": {
                "fn": "Veronica",
                "ln": "Porche Ali",
                "desc": "Third wife of Muhammad Ali",
                "label": "Veronica Porché Ali",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bb/Muhammad_Ali_and_Jimmy_Carter.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q36107", "Q969468"], "children": ["Q255099", "Q15727320"]},
            "main": false
        }, {
            "id": "Q255099",
            "data": {
                "fn": "Laila Amaria",
                "ln": "Ali",
                "desc": "American television personality and retired professional boxer",
                "label": "Laila Ali",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/d3/Laila_Ali_by_Gage_Skidmore.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q36107", "mother": "Q7922443", "spouses": ["Q5195707"], "children": []},
            "main": false
        }, {
            "id": "Q22941637",
            "data": {
                "fn": "Yolanda",
                "ln": "Williams",
                "desc": "wife of Mohammed Ali and advocate for Parkinson’s Research",
                "label": "Yolanda Williams",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/80/Lonnie_Ali_in_1997.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q36107"], "children": []},
            "main": false
        }, {
            "id": "Q15727320",
            "data": {
                "fn": "Hana Yasmeen",
                "ln": "Ali",
                "desc": "American actress; elder daughter of Muhammad Ali and Veronica Porché",
                "label": "Hana Ali",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q36107", "mother": "Q7922443", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q5049496",
            "data": {
                "fn": "Cassius Marcellus",
                "ln": "Clay",
                "desc": "American artist (1912-1990)",
                "label": "Cassius Marcellus Clay Sr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q107334783",
                "mother": "Q96631280",
                "spouses": ["Q6282262"],
                "children": ["Q36107", "Q6284282"]
            },
            "main": false
        }, {
            "id": "Q6282262",
            "data": {
                "fn": "Odessa",
                "ln": "Clay",
                "desc": "mother of boxer Muhammad Ali (1917-1994)",
                "label": "Odessa Grady Clay",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q96235809",
                "mother": "Q96235813",
                "spouses": ["Q5049496"],
                "children": ["Q36107", "Q6284282"]
            },
            "main": false
        }, {
            "id": "Q22941605",
            "data": {"fn": "", "ln": "", "desc": "no description", "label": "Sonji Roi", "avatar": null, "gender": "F"},
            "rels": {"spouses": ["Q36107"], "children": []},
            "main": false
        }, {
            "id": "Q83750013",
            "data": {
                "fn": "Gianna",
                "ln": "Bryant",
                "desc": "Vanessa Laine Bryant and Kobe Bryant's daughter (2006–2020)",
                "label": "Gianna Bryant",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/5f/Young_Gianna_Bryant_gazes_up_at_President_Barack_Obama_when_her_family_met_him_on_26_January_2010.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q25369", "mother": "Q83758350", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1332856",
            "data": {
                "fn": "Joseph",
                "ln": "Bryant",
                "desc": "American basketball head coach and retired player (1954–2024)",
                "label": "Joe Bryant",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/88/Joe_Bryant_2010.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q103971314"], "children": ["Q25369"]},
            "main": false
        }, {
            "id": "Q83758350",
            "data": {
                "fn": "Vanessa Laine Marie",
                "ln": "Bryant Laine Cornejo Urbieta",
                "desc": "American philanthropist",
                "label": "Vanessa Bryant",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c5/Vanessa_Bryant_in_2010.jpeg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q25369"], "children": ["Q83750013", "Q83827832"]},
            "main": false
        }, {
            "id": "Q103971314",
            "data": {
                "fn": "Pam",
                "ln": "Frierson Bryant",
                "desc": "no description",
                "label": "Pam Bryant",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q1332856"], "children": ["Q25369"]},
            "main": false
        }, {
            "id": "Q25369",
            "data": {
                "fn": "Kobe",
                "ln": "Bryant",
                "desc": "American basketball player (1978–2020)",
                "label": "Kobe Bryant",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/82/Kobe_Bryant_2015.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q1332856",
                "mother": "Q103971314",
                "spouses": ["Q83758350", "6a19a176-bbb2-4458-9c53-c0e7c3d7e7a1"],
                "children": ["Q83750013", "Q83827832", "Q103971696", "Q103971795"]
            },
            "main": false
        }, {
            "id": "Q1332856",
            "data": {
                "fn": "Joseph",
                "ln": "Bryant",
                "desc": "American basketball head coach and retired player (1954–2024)",
                "label": "Joe Bryant",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/88/Joe_Bryant_2010.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q103971314"], "children": ["Q25369"]},
            "main": false
        }, {
            "id": "Q83758350",
            "data": {
                "fn": "Vanessa Laine Marie",
                "ln": "Bryant Laine Cornejo Urbieta",
                "desc": "American philanthropist",
                "label": "Vanessa Bryant",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c5/Vanessa_Bryant_in_2010.jpeg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q25369"], "children": ["Q83750013", "Q83827832"]},
            "main": false
        }, {
            "id": "Q83750013",
            "data": {
                "fn": "Gianna",
                "ln": "Bryant",
                "desc": "Vanessa Laine Bryant and Kobe Bryant's daughter (2006–2020)",
                "label": "Gianna Bryant",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/5f/Young_Gianna_Bryant_gazes_up_at_President_Barack_Obama_when_her_family_met_him_on_26_January_2010.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q25369", "mother": "Q83758350", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q83827832",
            "data": {
                "fn": "Natalia Diamante",
                "ln": "Bryant",
                "desc": "Vanessa Laine Bryant and Kobe Bryant's daughter",
                "label": "Natalia Bryant",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q25369", "mother": "Q83758350", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q103971696",
            "data": {
                "fn": "",
                "ln": "Bryant",
                "desc": "no description",
                "label": "Capri Bryant",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q25369",
                "spouses": [],
                "children": [],
                "mother": "6a19a176-bbb2-4458-9c53-c0e7c3d7e7a1"
            },
            "main": false
        }, {
            "id": "Q103971795",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "no description",
                "label": "Bianka Bella Bryant",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q25369",
                "spouses": [],
                "children": [],
                "mother": "6a19a176-bbb2-4458-9c53-c0e7c3d7e7a1"
            },
            "main": false
        }, {
            "id": "Q575689",
            "data": {
                "fn": "Kourtney Mary",
                "ln": "Kardashian",
                "desc": "American media personality, model and businesswoman (born 1979)",
                "label": "Kourtney Kardashian",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4c/Kourtney_Kardashian_VOGUE_2021_01.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q1816737", "mother": "Q1138235", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1375057",
            "data": {
                "fn": "Kendall Nicole",
                "ln": "Jenner",
                "desc": "American media personality and model (born 1995)",
                "label": "Kendall Jenner",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/7e/Kendall_Jenner_at_Met_Gala_2021_5.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q365144", "mother": "Q1138235", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q365144",
            "data": {
                "fn": "Caitlyn Marie William Bruce",
                "ln": "Jenner",
                "desc": "American media personality and retired decathlete",
                "label": "Caitlyn Jenner",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/94/Caitlyn_Jenner.jpeg"
            },
            "rels": {"spouses": ["Q1138235"], "children": ["Q1375057", "Q1770624"]},
            "main": false
        }, {
            "id": "Q1770624",
            "data": {
                "fn": "Kylie Kristen",
                "ln": "Jenner",
                "desc": "American media personality",
                "label": "Kylie Jenner",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/65/Kylie_Jenner_in_2021.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q365144", "mother": "Q1138235", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q231270",
            "data": {
                "fn": "Khloé Alexandra",
                "ln": "Kardashian",
                "desc": "American media personality,influencer, businesswoman (born 1984)",
                "label": "Khloé Kardashian",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9b/Khloe_Kardashian.png",
                "gender": "F"
            },
            "rels": {"father": "Q1816737", "mother": "Q1138235", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1138235",
            "data": {
                "fn": "Kris Kristen Mary",
                "ln": "Houghton Kardashian Jenner Houghton",
                "desc": "American media personality, socialite, and businesswoman",
                "label": "Kris Jenner",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/65/Kris_Jenner_shot_by_Jim_Jordan_at_White_Cross_Studios_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q99952140",
                "mother": "Q54997217",
                "spouses": ["Q1816737", "Q365144"],
                "children": ["Q1375057", "Q1770624", "Q186304", "Q575689", "Q231270", "Q26318"]
            },
            "main": false
        }, {
            "id": "Q26318",
            "data": {
                "fn": "Robert Arthur",
                "ln": "Kardashian",
                "desc": "American television personality and businessman",
                "label": "Rob Kardashian",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q1816737", "mother": "Q1138235", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q231270",
            "data": {
                "fn": "Khloé Alexandra",
                "ln": "Kardashian",
                "desc": "American media personality,influencer, businesswoman (born 1984)",
                "label": "Khloé Kardashian",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9b/Khloe_Kardashian.png",
                "gender": "F"
            },
            "rels": {"father": "Q1816737", "mother": "Q1138235", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q60633179",
            "data": {
                "fn": "Donda",
                "ln": "West",
                "desc": "American professor and the mother of Kanye West",
                "label": "Donda West",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/16/Donda_West.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q75827668"], "children": ["Q15935"]},
            "main": false
        }, {
            "id": "Q15935",
            "data": {
                "fn": "God Omari Ye",
                "ln": "West",
                "desc": "American rapper, record producer, singer, and fashion designer (born 1977)",
                "label": "Kanye West",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/10/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q75827668",
                "mother": "Q60633179",
                "spouses": ["Q186304"],
                "children": ["Q55428718", "Q55428786", "Q56034652", "Q63927876"]
            },
            "main": false
        }, {
            "id": "Q99952140",
            "data": {
                "fn": "Robert",
                "ln": "Houghton",
                "desc": "(1931-1975)",
                "label": "Robert True Houghton",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q54997217"], "children": ["Q1138235"]},
            "main": false
        }, {
            "id": "Q54997217",
            "data": {
                "fn": "Mary",
                "ln": "",
                "desc": "Kris Jenner's mother",
                "label": "Mary Jo Campbell",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q99952140"], "children": ["Q1138235"]},
            "main": false
        }, {
            "id": "Q575689",
            "data": {
                "fn": "Kourtney Mary",
                "ln": "Kardashian",
                "desc": "American media personality, model and businesswoman (born 1979)",
                "label": "Kourtney Kardashian",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4c/Kourtney_Kardashian_VOGUE_2021_01.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q1816737", "mother": "Q1138235", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q15935",
            "data": {
                "fn": "God Omari Ye",
                "ln": "West",
                "desc": "American rapper, record producer, singer, and fashion designer (born 1977)",
                "label": "Kanye West",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/10/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q75827668",
                "mother": "Q60633179",
                "spouses": ["Q186304"],
                "children": ["Q55428718", "Q55428786", "Q56034652", "Q63927876"]
            },
            "main": false
        }, {
            "id": "Q15935",
            "data": {
                "fn": "God Omari Ye",
                "ln": "West",
                "desc": "American rapper, record producer, singer, and fashion designer (born 1977)",
                "label": "Kanye West",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/10/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q75827668",
                "mother": "Q60633179",
                "spouses": ["Q186304"],
                "children": ["Q55428718", "Q55428786", "Q56034652", "Q63927876"]
            },
            "main": false
        }, {
            "id": "Q15935",
            "data": {
                "fn": "God Omari Ye",
                "ln": "West",
                "desc": "American rapper, record producer, singer, and fashion designer (born 1977)",
                "label": "Kanye West",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/10/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q75827668",
                "mother": "Q60633179",
                "spouses": ["Q186304"],
                "children": ["Q55428718", "Q55428786", "Q56034652", "Q63927876"]
            },
            "main": false
        }, {
            "id": "Q75827668",
            "data": {
                "fn": "Ray",
                "ln": "West",
                "desc": "American photojournalist",
                "label": "Ray West",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q60633179"], "children": ["Q15935"]},
            "main": false
        }, {
            "id": "Q26318",
            "data": {
                "fn": "Robert Arthur",
                "ln": "Kardashian",
                "desc": "American television personality and businessman",
                "label": "Rob Kardashian",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q1816737", "mother": "Q1138235", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q123531838",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "The widow of Robert Kardashian",
                "label": "Ellen Pierson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q1816737"], "children": []},
            "main": false
        }, {
            "id": "Q186304",
            "data": {
                "fn": "Agustina Noel",
                "ln": "Kardashian West",
                "desc": "American media personality, businesswoman, model and actress (born 1980)",
                "label": "Kim Kardashian",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/08/President_Trump_Meets_with_Sentencing_Commutation_Recipients_%2849624188912%29_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q1816737",
                "mother": "Q1138235",
                "spouses": ["Q21013519", "Q363421", "Q15935"],
                "children": ["Q55428718", "Q55428786", "Q56034652", "Q63927876"]
            },
            "main": false
        }, {
            "id": "Q1816737",
            "data": {
                "fn": "Robert George",
                "ln": "Kardashian",
                "desc": "American attorney and businessman (1944–2003)",
                "label": "Robert Kardashian",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q1138235", "Q123531838"], "children": ["Q575689", "Q186304", "Q26318", "Q231270"]},
            "main": false
        }, {
            "id": "Q1138235",
            "data": {
                "fn": "Kris Kristen Mary",
                "ln": "Houghton Kardashian Jenner Houghton",
                "desc": "American media personality, socialite, and businesswoman",
                "label": "Kris Jenner",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/65/Kris_Jenner_shot_by_Jim_Jordan_at_White_Cross_Studios_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q99952140",
                "mother": "Q54997217",
                "spouses": ["Q1816737", "Q365144"],
                "children": ["Q1375057", "Q1770624", "Q186304", "Q575689", "Q231270", "Q26318"]
            },
            "main": false
        }, {
            "id": "Q63927876",
            "data": {
                "fn": "Psalm",
                "ln": "West",
                "desc": "Kanye West and Kim Kardashian's son",
                "label": "Psalm West",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q15935", "mother": "Q186304", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q56034652",
            "data": {
                "fn": "Chicago",
                "ln": "West",
                "desc": "Kanye West & Kim Kardashian's daughter",
                "label": "Chicago West",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q15935", "mother": "Q186304", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q55428786",
            "data": {
                "fn": "Saint",
                "ln": "West",
                "desc": "child of Kanye West and Kim Kardashian",
                "label": "Saint West",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q15935", "mother": "Q186304", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q55428718",
            "data": {
                "fn": "North",
                "ln": "West",
                "desc": "eldest child of Kanye West and Kim Kardashian",
                "label": "North West",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q15935", "mother": "Q186304", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q15935",
            "data": {
                "fn": "God Omari Ye",
                "ln": "West",
                "desc": "American rapper, record producer, singer, and fashion designer (born 1977)",
                "label": "Kanye West",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/10/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q75827668",
                "mother": "Q60633179",
                "spouses": ["Q186304"],
                "children": ["Q55428718", "Q55428786", "Q56034652", "Q63927876"]
            },
            "main": false
        }, {
            "id": "Q363421",
            "data": {
                "fn": "Kris",
                "ln": "Humphries",
                "desc": "American basketball player",
                "label": "Kris Humphries",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/15/Kris_Humphries_NJ_Nets_2009_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q186304"], "children": []},
            "main": false
        }, {
            "id": "Q21013519",
            "data": {
                "fn": "Damon",
                "ln": "Thomas",
                "desc": "American songwriter, record producer",
                "label": "Damon Thomas",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q186304"], "children": []},
            "main": false
        }, {
            "id": "Q298209",
            "data": {
                "fn": "Willow Camille",
                "ln": "Smith",
                "desc": "American singer and actress (born 2000)",
                "label": "Willow Smith",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bf/Willow_Smith_Black_Shield_Maiden_2024.png",
                "gender": "F"
            },
            "rels": {"father": "Q40096", "mother": "Q228787", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q228787",
            "data": {
                "fn": "Jada Koren",
                "ln": "Pinkett Smith",
                "desc": "American actress (born 1971)",
                "label": "Jada Pinkett Smith",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bd/Jada_Pinkett_Smith_at_NY_PaleyFest_2014_for_Gotham.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q40096"], "children": ["Q221364", "Q298209"]},
            "main": false
        }, {
            "id": "Q3518692",
            "data": {
                "fn": "Terrell",
                "ln": "Fletcher",
                "desc": "American football player (born 1973)",
                "label": "Terrell Fletcher",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/77/Terrell_Fletcher%2C_former_San_Diego_Chargers_runningback.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q21012774"], "children": []},
            "main": false
        }, {
            "id": "Q228787",
            "data": {
                "fn": "Jada Koren",
                "ln": "Pinkett Smith",
                "desc": "American actress (born 1971)",
                "label": "Jada Pinkett Smith",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bd/Jada_Pinkett_Smith_at_NY_PaleyFest_2014_for_Gotham.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q40096"], "children": ["Q221364", "Q298209"]},
            "main": false
        }, {
            "id": "Q40096",
            "data": {
                "fn": "Willard Carroll",
                "ln": "Smith",
                "desc": "American actor, film producer and rapper (born 1968)",
                "label": "Will Smith",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/67/Will_Smith_by_Gage_Skidmore_2.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q107338232",
                "spouses": ["Q228787", "Q21012774"],
                "children": ["Q221364", "Q298209", "Q7885297"],
                "mother": "786523e5-c164-429a-9701-0ff32d7687ce"
            },
            "main": false
        }, {
            "id": "Q298209",
            "data": {
                "fn": "Willow Camille",
                "ln": "Smith",
                "desc": "American singer and actress (born 2000)",
                "label": "Willow Smith",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bf/Willow_Smith_Black_Shield_Maiden_2024.png",
                "gender": "F"
            },
            "rels": {"father": "Q40096", "mother": "Q228787", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q7885297",
            "data": {
                "fn": "Willard Carroll",
                "ln": "Smith",
                "desc": "American actor and DJ",
                "label": "Trey Smith",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q40096", "mother": "Q21012774", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q221364",
            "data": {
                "fn": "Jaden Christopher Syre",
                "ln": "Smith",
                "desc": "American rapper, singer, songwriter, and actor",
                "label": "Jaden Smith",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4e/2019_-_Opening_Night_SM1_0502_%2849014567373%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q40096", "mother": "Q228787", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q107338233",
            "data": {
                "fn": "George",
                "ln": "",
                "desc": "no description",
                "label": "George Smith Willard",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["8e092bb9-9f30-4bbd-a1ad-cdb2fac13602"], "children": ["Q107338232"]},
            "main": false
        }, {
            "id": "Q21012774",
            "data": {
                "fn": "Sheree",
                "ln": "Zampino",
                "desc": "first wife of American actor Will Smith",
                "label": "Sheree Zampino",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q40096", "Q3518692"], "children": ["Q7885297"]},
            "main": false
        }, {
            "id": "Q7885297",
            "data": {
                "fn": "Willard Carroll",
                "ln": "Smith",
                "desc": "American actor and DJ",
                "label": "Trey Smith",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q40096", "mother": "Q21012774", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q107338232",
            "data": {
                "fn": "Willard",
                "ln": "",
                "desc": "24 Nov 1939 - 7 Nov 2016",
                "label": "Willard Carroll Smith Sr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q107338233",
                "spouses": ["786523e5-c164-429a-9701-0ff32d7687ce"],
                "children": ["Q40096"],
                "mother": "8e092bb9-9f30-4bbd-a1ad-cdb2fac13602"
            },
            "main": false
        }, {
            "id": "Q230654",
            "data": {
                "fn": "Maria",
                "ln": "Shriver",
                "desc": "First Lady of California from 2003 to 2011",
                "label": "Maria Shriver",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/44/Maria_Shriver_by_Gage_Skidmore.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q317248",
                "mother": "Q272908",
                "spouses": ["Q2685"],
                "children": ["Q4521676", "Q901541", "Q28109928", "Q28109921"]
            },
            "main": false
        }, {
            "id": "Q317248",
            "data": {
                "fn": "Robert Sargent",
                "ln": "Shriver",
                "desc": "American diplomat, politician and activist (1915-2011)",
                "label": "Sargent Shriver",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ee/Sargent_Shriver_1961.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q272908"], "children": ["Q230654"]},
            "main": false
        }, {
            "id": "Q230654",
            "data": {
                "fn": "Maria",
                "ln": "Shriver",
                "desc": "First Lady of California from 2003 to 2011",
                "label": "Maria Shriver",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/44/Maria_Shriver_by_Gage_Skidmore.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q317248",
                "mother": "Q272908",
                "spouses": ["Q2685"],
                "children": ["Q4521676", "Q901541", "Q28109928", "Q28109921"]
            },
            "main": false
        }, {
            "id": "Q503706",
            "data": {
                "fn": "Christopher Michael",
                "ln": "Pratt",
                "desc": "American actor (born 1979)",
                "label": "Chris Pratt",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/99/Chris_Pratt_2018.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q4521676"], "children": ["Q112833739"]},
            "main": false
        }, {
            "id": "Q230654",
            "data": {
                "fn": "Maria",
                "ln": "Shriver",
                "desc": "First Lady of California from 2003 to 2011",
                "label": "Maria Shriver",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/44/Maria_Shriver_by_Gage_Skidmore.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q317248",
                "mother": "Q272908",
                "spouses": ["Q2685"],
                "children": ["Q4521676", "Q901541", "Q28109928", "Q28109921"]
            },
            "main": false
        }, {
            "id": "Q230654",
            "data": {
                "fn": "Maria",
                "ln": "Shriver",
                "desc": "First Lady of California from 2003 to 2011",
                "label": "Maria Shriver",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/44/Maria_Shriver_by_Gage_Skidmore.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q317248",
                "mother": "Q272908",
                "spouses": ["Q2685"],
                "children": ["Q4521676", "Q901541", "Q28109928", "Q28109921"]
            },
            "main": false
        }, {
            "id": "Q23800370",
            "data": {
                "fn": "Aurelia",
                "ln": "Schwarzenegger no label",
                "desc": "Arnold Schwarzenegger's mother (1922-1998)",
                "label": "Aurelia Schwarzenegger",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q3288486"], "children": ["Q2685", "Q38196234"]},
            "main": false
        }, {
            "id": "Q38196234",
            "data": {
                "fn": "Meinhard",
                "ln": "Schwarzenegger",
                "desc": "Arnold Schwarzenegger's brother",
                "label": "Meinhard Schwarzenegger",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3288486", "mother": "Q23800370", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q112833739",
            "data": {
                "fn": "Eloise Christina",
                "ln": "Schwarzenegger Pratt",
                "desc": "daughter of Katherine Schwarzenegger",
                "label": "Eloise Christina Schwarzenegger Pratt",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q503706", "mother": "Q4521676", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75494768",
            "data": {
                "fn": "Mildred",
                "ln": "Baena",
                "desc": "mother of Joseph Baena",
                "label": "Mildred Patricia Baena",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q75496774", "Q2685"], "children": ["Q23800185"]},
            "main": false
        }, {
            "id": "Q38196234",
            "data": {
                "fn": "Meinhard",
                "ln": "Schwarzenegger",
                "desc": "Arnold Schwarzenegger's brother",
                "label": "Meinhard Schwarzenegger",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3288486", "mother": "Q23800370", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q107295225",
            "data": {"fn": "", "ln": "", "desc": "1872", "label": "Karl Schwarzenegger", "avatar": null, "gender": "M"},
            "rels": {"spouses": ["Q107295231"], "children": ["Q3288486"]},
            "main": false
        }, {
            "id": "Q107295231",
            "data": {
                "fn": "Cecilia",
                "ln": "",
                "desc": "(1878-1968)",
                "label": "Cecilia Schwarzenegger",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q107295225"], "children": ["Q3288486"]},
            "main": false
        }, {
            "id": "Q75496774",
            "data": {
                "fn": "Rogelio",
                "ln": "Baena",
                "desc": "no description",
                "label": "Rogelio Baena",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q75494768"], "children": []},
            "main": false
        }, {
            "id": "Q2685",
            "data": {
                "fn": "Arnold Alois",
                "ln": "Schwarzenegger",
                "desc": "Austrian and American actor, bodybuilder, and politician",
                "label": "Arnold Schwarzenegger",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/be/Arnold_Schwarzenegger_-_2019_%2833730956438%29_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q3288486",
                "mother": "Q23800370",
                "spouses": ["Q230654", "Q75494768"],
                "children": ["Q4521676", "Q901541", "Q28109921", "Q28109928", "Q23800185"]
            },
            "main": false
        }, {
            "id": "Q28109921",
            "data": {
                "fn": "Christina",
                "ln": "Schwarzenegger",
                "desc": "American actress",
                "label": "Christina Schwarzenegger",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q2685", "mother": "Q230654", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q28109928",
            "data": {
                "fn": "Christopher",
                "ln": "Schwarzenegger",
                "desc": "no description",
                "label": "Christopher Schwarzenegger",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q2685", "mother": "Q230654", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q901541",
            "data": {
                "fn": "Patrick Arnold",
                "ln": "Schwarzenegger",
                "desc": "American actor and model (born 1993)",
                "label": "Patrick Schwarzenegger",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/62/Patrick_Schwarzenegger_TIFF_2012.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q2685", "mother": "Q230654", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q4521676",
            "data": {
                "fn": "Katherine",
                "ln": "Schwarzenegger",
                "desc": "American writer (born 1989)",
                "label": "Katherine Schwarzenegger",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/71/Katherine_Schwarzenegger_World_Dog_Awards_2015_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q2685", "mother": "Q230654", "spouses": ["Q503706"], "children": ["Q112833739"]},
            "main": false
        }, {
            "id": "Q272908",
            "data": {
                "fn": "Eunice Mary",
                "ln": "Kennedy Shriver",
                "desc": "American philanthropist; founder of the Special Olympics; sister of John F. Kennedy (1921–2009)",
                "label": "Eunice Kennedy Shriver",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4c/Eunice-Kennedy.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": ["Q317248"], "children": ["Q230654"]},
            "main": false
        }, {
            "id": "Q230654",
            "data": {
                "fn": "Maria",
                "ln": "Shriver",
                "desc": "First Lady of California from 2003 to 2011",
                "label": "Maria Shriver",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/44/Maria_Shriver_by_Gage_Skidmore.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q317248",
                "mother": "Q272908",
                "spouses": ["Q2685"],
                "children": ["Q4521676", "Q901541", "Q28109928", "Q28109921"]
            },
            "main": false
        }, {
            "id": "Q3288486",
            "data": {
                "fn": "Gustav",
                "ln": "Schwarzenegger",
                "desc": "Austrian police chief and father of Arnold Schwarzenegger (1907–1972)",
                "label": "Gustav Schwarzenegger",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q107295225",
                "mother": "Q107295231",
                "spouses": ["Q23800370"],
                "children": ["Q2685", "Q38196234"]
            },
            "main": false
        }, {
            "id": "Q23800370",
            "data": {
                "fn": "Aurelia",
                "ln": "Schwarzenegger no label",
                "desc": "Arnold Schwarzenegger's mother (1922-1998)",
                "label": "Aurelia Schwarzenegger",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q3288486"], "children": ["Q2685", "Q38196234"]},
            "main": false
        }, {
            "id": "Q23800185",
            "data": {
                "fn": "Joseph",
                "ln": "Baena",
                "desc": "son of Arnold Schwarzenegger",
                "label": "Joseph Baena",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q2685", "mother": "Q75494768", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q36153",
            "data": {
                "fn": "Beyoncé Giselle",
                "ln": "Knowles Carter",
                "desc": "American singer",
                "label": "Beyoncé",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b7/Beyonc%C3%A9_-_Tottenham_Hotspur_Stadium_-_1st_June_2023_%2810_of_118%29_%2852946364598%29_%28best_crop%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q3043962",
                "mother": "Q2623520",
                "spouses": ["Q62766"],
                "children": ["Q47509542", "Q18913048", "Q47509493"]
            },
            "main": false
        }, {
            "id": "Q2623520",
            "data": {
                "fn": "Célestine Ann",
                "ln": "Beyoncé Knowles",
                "desc": "American businesswoman and fashion designer, mother of Beyoncé and Solange Knowles",
                "label": "Tina Knowles",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2c/MT_high_res_vmag..jpeg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q3043962"], "children": ["Q36153"]},
            "main": false
        }, {
            "id": "Q36153",
            "data": {
                "fn": "Beyoncé Giselle",
                "ln": "Knowles Carter",
                "desc": "American singer",
                "label": "Beyoncé",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b7/Beyonc%C3%A9_-_Tottenham_Hotspur_Stadium_-_1st_June_2023_%2810_of_118%29_%2852946364598%29_%28best_crop%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q3043962",
                "mother": "Q2623520",
                "spouses": ["Q62766"],
                "children": ["Q47509542", "Q18913048", "Q47509493"]
            },
            "main": false
        }, {
            "id": "Q3043962",
            "data": {
                "fn": "Mathew",
                "ln": "Knowles",
                "desc": "American music executive, businessman, record producer, and manager",
                "label": "Mathew Knowles",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q2623520"], "children": ["Q36153"]},
            "main": false
        }, {
            "id": "Q36153",
            "data": {
                "fn": "Beyoncé Giselle",
                "ln": "Knowles Carter",
                "desc": "American singer",
                "label": "Beyoncé",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b7/Beyonc%C3%A9_-_Tottenham_Hotspur_Stadium_-_1st_June_2023_%2810_of_118%29_%2852946364598%29_%28best_crop%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q3043962",
                "mother": "Q2623520",
                "spouses": ["Q62766"],
                "children": ["Q47509542", "Q18913048", "Q47509493"]
            },
            "main": false
        }, {
            "id": "Q62766",
            "data": {
                "fn": "Shawn Corey",
                "ln": "Carter",
                "desc": "American rapper and entrepreneur from New York",
                "label": "Jay-Z",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9c/Jay-Z_%40_Shawn_%27Jay-Z%27_Carter_Foundation_Carnival_%28crop_2%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q18913057",
                "mother": "Q18913055",
                "spouses": ["Q36153"],
                "children": ["Q18913048", "Q47509493", "Q47509542"]
            },
            "main": false
        }, {
            "id": "Q47509493",
            "data": {
                "fn": "",
                "ln": "Carter",
                "desc": "son of Beyoncé and Jay-Z",
                "label": "Sir Carter",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q62766", "mother": "Q36153", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q18913048",
            "data": {
                "fn": "Blue Ivy",
                "ln": "Carter",
                "desc": "American singer and daughter of Jay-Z and Beyoncé",
                "label": "Blue Ivy Carter",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fb/Blue_Ivy_Carter_-_Beyonc%C3%A9_Renaissance_World_Tour_-_Tottenham_Hotspur_Stadium_-_1st_June_2023_%2862_of_118%29_%2852945302082%29_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q62766", "mother": "Q36153", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q47509542",
            "data": {
                "fn": "",
                "ln": "Carter",
                "desc": "daughter of Beyoncé and Jay-Z",
                "label": "Rumi Carter",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q62766", "mother": "Q36153", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q36153",
            "data": {
                "fn": "Beyoncé Giselle",
                "ln": "Knowles Carter",
                "desc": "American singer",
                "label": "Beyoncé",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b7/Beyonc%C3%A9_-_Tottenham_Hotspur_Stadium_-_1st_June_2023_%2810_of_118%29_%2852946364598%29_%28best_crop%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q3043962",
                "mother": "Q2623520",
                "spouses": ["Q62766"],
                "children": ["Q47509542", "Q18913048", "Q47509493"]
            },
            "main": false
        }, {
            "id": "Q18913057",
            "data": {
                "fn": "",
                "ln": "Reeves Reeve",
                "desc": "father of Jay-Z",
                "label": "Adnes Reeves",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q18913055"], "children": ["Q62766"]},
            "main": false
        }, {
            "id": "Q18913055",
            "data": {
                "fn": "Gloria",
                "ln": "Carter",
                "desc": "mother of Jay-Z",
                "label": "Gloria Carter",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q18913057"], "children": ["Q62766"]},
            "main": false
        }, {
            "id": "Q154920",
            "data": {
                "fn": "Edward Antony Richard Louis",
                "ln": "Mountbatten-Windsor",
                "desc": "Youngest child of Elizabeth II and Prince Philip, Duke of Edinburgh (born 1964)",
                "label": "Prince Edward, Duke of Edinburgh",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fe/Prince_Edward_2022.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q80976", "mother": "Q9682", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q153330",
            "data": {
                "fn": "Andrew Albert Christian Edward",
                "ln": "Mountbatten-Windsor",
                "desc": "second son and third child of Queen Elizabeth II and Prince Philip, Duke of Edinburgh (born 1960)",
                "label": "Prince Andrew, Duke of York",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3e/Pr%C3%ADncipe_Andr%C3%A9_do_Reino_Unido.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q80976", "mother": "Q9682", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q151754",
            "data": {
                "fn": "Anne Elizabeth Alice Louise",
                "ln": "Windsor",
                "desc": "daughter of Queen Elizabeth II and Prince Philip, Duke of Edinburgh",
                "label": "Anne, Princess Royal",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/80/Princess_Anne_Wellington_2023.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q80976", "mother": "Q9682", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q10633",
            "data": {
                "fn": "Elizabeth Angela Marguerite",
                "ln": "Bowes-Lyon Windsor",
                "desc": "Queen consort of the United Kingdom from 1936 to 1952",
                "label": "Queen Elizabeth, The Queen Mother",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2d/Queen_Elizabeth_the_Queen_Mother_portrait.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q335159",
                "mother": "Q238820",
                "spouses": ["Q280856"],
                "children": ["Q9682", "Q153815"]
            },
            "main": false
        }, {
            "id": "Q280856",
            "data": {
                "fn": "Albert Frederick Arthur George",
                "ln": "Windsor",
                "desc": "King of the United Kingdom from 1936 to 1952, Emperor of India from 1936 to 1948 (1895–1952)",
                "label": "George VI",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e0/King_George_VI_LOC_matpc.14736_A_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": ["Q10633"], "children": ["Q9682", "Q153815"]},
            "main": false
        }, {
            "id": "Q235349",
            "data": {
                "fn": "Jill Tracy",
                "ln": "Biden Jacobs Stevenson",
                "desc": "American educator and First Lady of the United States",
                "label": "Jill Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/66/Jill_Biden_official_portrait_crop.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q110716051",
                "mother": "Q110716054",
                "spouses": ["Q6279", "Q100502650"],
                "children": ["Q97588420"]
            },
            "main": false
        }, {
            "id": "Q100598230",
            "data": {
                "fn": "Melissa",
                "ln": "Cohen Biden",
                "desc": "Wife of Hunter Biden",
                "label": "Melissa Cohen",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/cd/Melissa_Cohen_%2850875523797%29_%281%29.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q5944264"], "children": ["Q102866463"]},
            "main": false
        }, {
            "id": "Q100331973",
            "data": {
                "fn": "Howard David",
                "ln": "Krein",
                "desc": "American otolaryngologist, plastic surgeon, and business executive and assistant professor at Thomas Jefferson University",
                "label": "Howard Krein",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c1/Howard_Krein_%28cropped_from_wedding_portrait%29.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q97588420"], "children": []},
            "main": false
        }, {
            "id": "Q100605104",
            "data": {
                "fn": "Finnegan",
                "ln": "Biden",
                "desc": "granddaughter of U.S. President Joe Biden",
                "label": "Finnegan Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fe/Finnegan_Biden_2023_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q5944264", "mother": "Q100598223", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q100605126",
            "data": {
                "fn": "Naomi",
                "ln": "Biden",
                "desc": "granddaughter of Joe Biden",
                "label": "Naomi Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/7a/Joe_Biden_and_Jill_Biden_attend_the_wedding_of_Peter_Neal_and_Naomi_Biden_Neal_%2852510895180%29_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q5944264", "mother": "Q100598223", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q100598223",
            "data": {
                "fn": "Kathleen",
                "ln": "Buhle Biden",
                "desc": "Former wife of Hunter Biden",
                "label": "Kathleen Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c7/Kathleen_Biden_2014_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q5944264"], "children": ["Q100605104", "Q100605123", "Q100605126"]},
            "main": false
        }, {
            "id": "Q5944264",
            "data": {
                "fn": "Robert Hunter",
                "ln": "Biden",
                "desc": "American businessman and lobbyist (born 1970)",
                "label": "Hunter Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8a/Hunter_Biden_September_30%2C_2014.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q6279",
                "mother": "Q19285477",
                "spouses": ["Q100598223", "Q100598230", "c3709839-9cc1-4a5e-8c99-f51142d9306d"],
                "children": ["Q100605104", "Q100605123", "Q100605126", "Q102866463", "Q102868699"]
            },
            "main": false
        }, {
            "id": "Q19285477",
            "data": {
                "fn": "",
                "ln": "Hunter Biden",
                "desc": "American teacher and first wife of U.S. President Joe Biden",
                "label": "Neilia Hunter",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9d/Neilia_Hunter-Biden.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q6279"], "children": ["Q813332", "Q98854696", "Q5944264"]},
            "main": false
        }, {
            "id": "Q98854090",
            "data": {
                "fn": "Valerie",
                "ln": "Biden Owens",
                "desc": "American political strategist",
                "label": "Valerie Biden Owens",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/57/Valerie_Biden_Owens_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q20177093", "mother": "Q96318245", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q100605198",
            "data": {
                "fn": "Natalie Naomi",
                "ln": "Biden",
                "desc": "American internet personality and granddaughter of Joe Biden",
                "label": "Natalie Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6b/Natalie_Biden_at_the_59th_Presidential_Inauguration_ceremony_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q813332", "mother": "Q100598212", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q19285477",
            "data": {
                "fn": "",
                "ln": "Hunter Biden",
                "desc": "American teacher and first wife of U.S. President Joe Biden",
                "label": "Neilia Hunter",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9d/Neilia_Hunter-Biden.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q6279"], "children": ["Q813332", "Q98854696", "Q5944264"]},
            "main": false
        }, {
            "id": "Q110716054",
            "data": {
                "fn": "Bonny",
                "ln": "Godfrey",
                "desc": "1930 - 2008",
                "label": "Bonny Jean Godfrey",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q110716051"], "children": ["Q235349"]},
            "main": false
        }, {
            "id": "Q100502650",
            "data": {
                "fn": "Bill",
                "ln": "Stevenson",
                "desc": "first husband of Jill Biden",
                "label": "Bill Stevenson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q235349"], "children": []},
            "main": false
        }, {
            "id": "Q110716051",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "21 Jan 1927 - 7 Jun 1999",
                "label": "Donald Carl Jacobs",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q110716054"], "children": ["Q235349"]},
            "main": false
        }, {
            "id": "Q102866463",
            "data": {
                "fn": "Joseph Robinette",
                "ln": "Biden",
                "desc": "child of Hunter Biden and Melissa Cohen",
                "label": "Beau Biden Jr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q5944264", "mother": "Q100598230", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q102868699",
            "data": {
                "fn": "Joan",
                "ln": "Roberts",
                "desc": "Child of Hunter Biden and Lunden Alexis Roberts",
                "label": "Navy Joan Roberts",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q5944264",
                "spouses": [],
                "children": [],
                "mother": "c3709839-9cc1-4a5e-8c99-f51142d9306d"
            },
            "main": false
        }, {
            "id": "Q100605123",
            "data": {
                "fn": "Maisy",
                "ln": "Biden",
                "desc": "granddaughter of Joe Biden",
                "label": "Maisy Biden",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q5944264", "mother": "Q100598223", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q98854090",
            "data": {
                "fn": "Valerie",
                "ln": "Biden Owens",
                "desc": "American political strategist",
                "label": "Valerie Biden Owens",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/57/Valerie_Biden_Owens_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q20177093", "mother": "Q96318245", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q100605200",
            "data": {
                "fn": "Robert Hunter",
                "ln": "Biden",
                "desc": "grandson of Joe Biden",
                "label": "Robert Biden II",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q813332", "mother": "Q100598212", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q100598212",
            "data": {
                "fn": "Hallie",
                "ln": "Biden Olivere",
                "desc": "American school counselor",
                "label": "Hallie Olivere Biden",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q813332"], "children": ["Q100605198", "Q100605200"]},
            "main": false
        }, {
            "id": "Q100741820",
            "data": {
                "fn": "James Brian",
                "ln": "Biden",
                "desc": "brother of U.S. President Joe Biden",
                "label": "James Biden",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": [], "children": [], "father": "Q20177093", "mother": "Q96318245"},
            "main": false
        }, {
            "id": "Q101142281",
            "data": {
                "fn": "Mary",
                "ln": "Robinette Biden",
                "desc": "paternal grandmother of the 46th president of the United States (1894-1943)",
                "label": "Mary Elizabeth Robinette",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q100276774"], "children": ["Q20177093"]},
            "main": false
        }, {
            "id": "Q100741824",
            "data": {
                "fn": "Francis William",
                "ln": "Biden",
                "desc": "brother of U.S. President Joe Biden",
                "label": "Francis Biden",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q20177093", "spouses": [], "children": [], "mother": "Q96318245"},
            "main": false
        }, {
            "id": "Q100276774",
            "data": {
                "fn": "Joseph Harry",
                "ln": "Biden",
                "desc": "grand-father of Joe Biden",
                "label": "Joseph Harry Biden",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q101142281"], "children": ["Q20177093"]},
            "main": false
        }, {
            "id": "Q96318257",
            "data": {
                "fn": "Ambrose Joseph",
                "ln": "Finnegan",
                "desc": "maternal grandfather of Joe Biden",
                "label": "Ambrose Joseph Finnegan",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q96318259"], "children": ["Q96318245"]},
            "main": false
        }, {
            "id": "Q20177093",
            "data": {
                "fn": "Joseph Robinette",
                "ln": "Biden",
                "desc": "father of the 46th President of the United States Joe Biden",
                "label": "Joseph Robinette Biden Sr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q100276774",
                "mother": "Q101142281",
                "spouses": ["Q96318245"],
                "children": ["Q6279", "Q98854090", "Q100741820", "Q100741824"]
            },
            "main": false
        }, {
            "id": "Q100741824",
            "data": {
                "fn": "Francis William",
                "ln": "Biden",
                "desc": "brother of U.S. President Joe Biden",
                "label": "Francis Biden",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q20177093", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q96318259",
            "data": {
                "fn": "Geraldine Catharine",
                "ln": "Blewitt Finnegan",
                "desc": "maternal grandmother of Joe Biden",
                "label": "Geraldine C. Blewitt",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q96318257"], "children": ["Q96318245"]},
            "main": false
        }, {
            "id": "Q100741820",
            "data": {
                "fn": "James Brian",
                "ln": "Biden",
                "desc": "brother of U.S. President Joe Biden",
                "label": "James Biden",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q97588420",
            "data": {
                "fn": "Ashley Blazer",
                "ln": "Biden",
                "desc": "American social worker and fashion designer (born 1981)",
                "label": "Ashley Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c4/Ashley_Biden_at_Oscars_2016.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q6279", "mother": "Q235349", "spouses": ["Q100331973"], "children": []},
            "main": false
        }, {
            "id": "Q6279",
            "data": {
                "fn": "Joseph Robinette",
                "ln": "Biden",
                "desc": "46th President of the United States (2021–2024)",
                "label": "Joe Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/68/Joe_Biden_presidential_portrait.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q20177093",
                "mother": "Q96318245",
                "spouses": ["Q19285477", "Q235349"],
                "children": ["Q813332", "Q98854696", "Q5944264", "Q97588420"]
            },
            "main": false
        }, {
            "id": "Q235349",
            "data": {
                "fn": "Jill Tracy",
                "ln": "Biden Jacobs Stevenson",
                "desc": "American educator and First Lady of the United States",
                "label": "Jill Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/66/Jill_Biden_official_portrait_crop.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q110716051",
                "mother": "Q110716054",
                "spouses": ["Q6279", "Q100502650"],
                "children": ["Q97588420"]
            },
            "main": false
        }, {
            "id": "Q19285477",
            "data": {
                "fn": "",
                "ln": "Hunter Biden",
                "desc": "American teacher and first wife of U.S. President Joe Biden",
                "label": "Neilia Hunter",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9d/Neilia_Hunter-Biden.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q6279"], "children": ["Q813332", "Q98854696", "Q5944264"]},
            "main": false
        }, {
            "id": "Q5944264",
            "data": {
                "fn": "Robert Hunter",
                "ln": "Biden",
                "desc": "American businessman and lobbyist (born 1970)",
                "label": "Hunter Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8a/Hunter_Biden_September_30%2C_2014.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q6279",
                "mother": "Q19285477",
                "spouses": ["Q100598223", "Q100598230"],
                "children": ["Q102868699", "Q100605104", "Q100605123", "Q100605126", "Q102866463"]
            },
            "main": false
        }, {
            "id": "Q98854696",
            "data": {
                "fn": "Naomi",
                "ln": "Biden",
                "desc": "daughter of Joe Biden (1971-1972)",
                "label": "Amy Biden",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q6279", "mother": "Q19285477", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q813332",
            "data": {
                "fn": "Joseph Robinette Beau",
                "ln": "Biden",
                "desc": "Attorney General of Delaware from 2007 to 2015",
                "label": "Beau Biden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/75/BeauBiden-DOJ2013_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q6279",
                "mother": "Q19285477",
                "spouses": ["Q100598212"],
                "children": ["Q100605198", "Q100605200"]
            },
            "main": false
        }, {
            "id": "Q96318245",
            "data": {
                "fn": "Catherine Jean Eugenia",
                "ln": "Finnegan Biden",
                "desc": "mother of Joe Biden (1917-2010)",
                "label": "Jean Biden",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q96318257",
                "mother": "Q96318259",
                "spouses": ["Q20177093"],
                "children": ["Q6279", "Q98854090", "Q100741820", "Q100741824"]
            },
            "main": false
        }, {
            "id": "Q20177093",
            "data": {
                "fn": "Joseph Robinette",
                "ln": "Biden",
                "desc": "father of the 46th President of the United States Joe Biden",
                "label": "Joseph Robinette Biden Sr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q100276774",
                "mother": "Q101142281",
                "spouses": ["Q96318245"],
                "children": ["Q6279", "Q98854090", "Q100741820", "Q100741824"]
            },
            "main": false
        }, {
            "id": "Q432473",
            "data": {
                "fn": "Melania",
                "ln": "Trump Knavs",
                "desc": "First Lady of the United States (2017–2021), model, and businesswoman",
                "label": "Melania Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/82/Melania_Trump_official_portrait.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q23000811", "mother": "Q23823122", "spouses": ["Q22686"], "children": ["Q23000814"]},
            "main": false
        }, {
            "id": "Q2597050",
            "data": {
                "fn": "Marla",
                "ln": "Maples Trump",
                "desc": "American actress and TV personality (born 1963)",
                "label": "Marla Maples",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2f/Marla_Maples_LF_crop.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q104149822",
                "spouses": ["Q22686"],
                "children": ["Q12071552"],
                "mother": "79a785e3-1a1f-4d2e-ab15-53e37dcdae5a"
            },
            "main": false
        }, {
            "id": "Q242351",
            "data": {
                "fn": "Ivana Marie",
                "ln": "Trump",
                "desc": "Czech-American businesswoman (1949–2022)",
                "label": "Ivana Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/cd/Ivana_Trump_cropped_retouched.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q104176774",
                "mother": "Q130962937",
                "spouses": ["Q130961825", "Q22686", "Q130961941", "Q3941615"],
                "children": ["Q3713655", "Q239411", "Q3731533"]
            },
            "main": false
        }, {
            "id": "Q22952511",
            "data": {
                "fn": "Mary Anne",
                "ln": "MacLeod Trump",
                "desc": "mother of Donald Trump (1912–2000)",
                "label": "Mary Anne MacLeod Trump",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q96198111",
                "mother": "Q96198112",
                "spouses": ["Q3752663"],
                "children": ["Q22686", "Q736223", "Q42682869", "Q28748031", "Q42682724"]
            },
            "main": false
        }, {
            "id": "Q23000814",
            "data": {
                "fn": "Barron William",
                "ln": "Trump",
                "desc": "son of Donald Trump and Melania Trump (born 2006)",
                "label": "Barron Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3e/Barron_Trump_on_the_White_House_South_Lawn.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q22686", "mother": "Q432473", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q12071552",
            "data": {
                "fn": "Tiffany Ariana",
                "ln": "Trump",
                "desc": "American research assistant and reality television personality",
                "label": "Tiffany Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0d/Tiffany_Trump_RNC_July_2016.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q22686", "mother": "Q2597050", "spouses": ["Q98105914"], "children": []},
            "main": false
        }, {
            "id": "Q3731533",
            "data": {
                "fn": "Eric Frederick",
                "ln": "Trump",
                "desc": "American businessman and reality television personality",
                "label": "Eric Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/84/Eric_Trump_by_Gage_Skidmore.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q22686",
                "mother": "Q242351",
                "spouses": ["Q29033452"],
                "children": ["Q92463701", "Q92463661"]
            },
            "main": false
        }, {
            "id": "Q239411",
            "data": {
                "fn": "Ivana Marie Ivanka",
                "ln": "Trump",
                "desc": "Senior Advisor to the President of the United States from 2017 to 2021",
                "label": "Ivanka Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4e/Ivanka_Trump_official_portrait_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q22686",
                "mother": "Q242351",
                "spouses": ["Q13628723"],
                "children": ["Q23000820", "Q23000821", "Q23647575"]
            },
            "main": false
        }, {
            "id": "Q3713655",
            "data": {
                "fn": "Donald John",
                "ln": "Trump",
                "desc": "American businessman and reality television personality",
                "label": "Donald Trump Jr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/89/Donald_Trump%2C_Jr._%2848513758216%29_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q22686",
                "mother": "Q242351",
                "spouses": ["Q4461939"],
                "children": ["Q23000822", "Q23000825", "Q23000826", "Q23000827", "Q23000828"]
            },
            "main": false
        }, {
            "id": "Q3752663",
            "data": {
                "fn": "Fred Christ Frederick",
                "ln": "Trump",
                "desc": "American real estate developer; father of Donald Trump (1905–1999)",
                "label": "Fred Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e3/Fred_Trump_in_the_1980s.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q21070387",
                "mother": "Q23600580",
                "spouses": ["Q22952511"],
                "children": ["Q736223", "Q42682724", "Q28748031", "Q42682869", "Q22686"]
            },
            "main": false
        }, {
            "id": "Q22686",
            "data": {
                "fn": "Donald John",
                "ln": "Trump",
                "desc": "President-elect of the United States and 47th President of the United States (2025–2025)",
                "label": "Donald Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/56/Donald_Trump_official_portrait.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q3752663",
                "mother": "Q22952511",
                "spouses": ["Q242351", "Q2597050", "Q432473"],
                "children": ["Q3713655", "Q239411", "Q3731533", "Q12071552", "Q23000814"]
            },
            "main": false
        }, {
            "id": "Q6761976",
            "data": {
                "fn": "Marian",
                "ln": "Robinson",
                "desc": "mother of Michelle Obama and the mother-in-law of President Barack Obama",
                "label": "Marian Shields Robinson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0d/Marian_Shields_Robinson_2022_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q15982139"], "children": ["Q13133"]},
            "main": false
        }, {
            "id": "Q13133",
            "data": {
                "fn": "Michelle LaVaughn",
                "ln": "Obama Robinson",
                "desc": "lawyer and former First Lady of the United States",
                "label": "Michelle Obama",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/53/Michelle_Obama_official_portrait_headshot.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q15982139",
                "mother": "Q6761976",
                "spouses": ["Q76"],
                "children": ["Q15070044", "Q15070048"]
            },
            "main": false
        }, {
            "id": "Q13133",
            "data": {
                "fn": "Michelle LaVaughn",
                "ln": "Obama Robinson",
                "desc": "lawyer and former First Lady of the United States",
                "label": "Michelle Obama",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/53/Michelle_Obama_official_portrait_headshot.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q15982139",
                "mother": "Q6761976",
                "spouses": ["Q76"],
                "children": ["Q15070044", "Q15070048"]
            },
            "main": false
        }, {
            "id": "Q15982139",
            "data": {
                "fn": "Fraser",
                "ln": "",
                "desc": "father of Michelle Obama and father-in-law of President Barack Obama",
                "label": "Fraser Robinson III",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q6761976"], "children": ["Q13133"]},
            "main": false
        }, {
            "id": "Q15982167",
            "data": {
                "fn": "Malik",
                "ln": "Obama",
                "desc": "Kenyan-American businessman and politician",
                "label": "Malik Obama",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Malik_Obama.png",
                "gender": "M"
            },
            "rels": {
                "father": "Q649593",
                "spouses": [],
                "children": [],
                "mother": "d704c83a-f3c4-4765-b5d3-c49629cf559d"
            },
            "main": false
        }, {
            "id": "Q773197",
            "data": {
                "fn": "Auma",
                "ln": "Obama",
                "desc": "Kenyan-British community activist, sociologist, journalist and author",
                "label": "Auma Obama",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/12/Auma_Obama.JPG",
                "gender": "F"
            },
            "rels": {"father": "Q649593", "mother": "Q15982183", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q4382677",
            "data": {
                "fn": "Maya Kasandra",
                "ln": "",
                "desc": "teacher and half-sister of Barack Obama",
                "label": "Maya Soetoro-Ng",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/59/Maya_Soetoro-Ng.png",
                "gender": "F"
            },
            "rels": {"father": "Q4115068", "mother": "Q766106", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q15982328",
            "data": {
                "fn": "Hussein",
                "ln": "Obama",
                "desc": "grandfather of U.S. president Barack Obama",
                "label": "Hussein Onyango Obama",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["39a42816-cd19-4495-b263-ed892ac633e6"], "children": ["Q649593"]},
            "main": false
        }, {
            "id": "Q15982322",
            "data": {
                "fn": "Bernard",
                "ln": "Obama",
                "desc": "half-brother of Barack Obama",
                "label": "Bernard Obama",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q649593",
                "spouses": [],
                "children": [],
                "mother": "d704c83a-f3c4-4765-b5d3-c49629cf559d"
            },
            "main": false
        }, {
            "id": "Q15982192",
            "data": {
                "fn": "Ruth Beatrice",
                "ln": "Baker",
                "desc": "no description",
                "label": "Ruth Ndesandjo",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q649593"], "children": ["Q15982189"]},
            "main": false
        }, {
            "id": "Q15982183",
            "data": {
                "fn": "",
                "ln": "Obama",
                "desc": "(1945-2021)",
                "label": "Kezia Obama",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q649593"], "children": ["Q15982321", "Q773197"]},
            "main": false
        }, {
            "id": "Q15982326",
            "data": {
                "fn": "George",
                "ln": "Obama",
                "desc": "no description",
                "label": "George Hussein Onyango Obama",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q649593",
                "spouses": [],
                "children": [],
                "mother": "d704c83a-f3c4-4765-b5d3-c49629cf559d"
            },
            "main": false
        }, {
            "id": "Q15982309",
            "data": {
                "fn": "David",
                "ln": "",
                "desc": "half-brother of Barack Obama",
                "label": "David Ndesandjo",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q649593",
                "spouses": [],
                "children": [],
                "mother": "d704c83a-f3c4-4765-b5d3-c49629cf559d"
            },
            "main": false
        }, {
            "id": "Q15982321",
            "data": {
                "fn": "",
                "ln": "Obama",
                "desc": "no description",
                "label": "Abo Obama",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q649593", "mother": "Q15982183", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q15982189",
            "data": {
                "fn": "Mark",
                "ln": "",
                "desc": "American writer, half-brother of Barack Obama",
                "label": "Mark Okoth Obama Ndesandjo",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q649593", "mother": "Q15982192", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q649593",
            "data": {
                "fn": "Barack Hussein",
                "ln": "Obama",
                "desc": "Economist, father of Barack Obama jr. (1934–1982)",
                "label": "Barack Obama Sr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q15982328",
                "spouses": ["Q766106", "Q15982192", "Q15982183", "d704c83a-f3c4-4765-b5d3-c49629cf559d"],
                "children": ["Q76", "Q15982189", "Q15982321", "Q773197", "Q15982326", "Q15982167", "Q15982309", "Q15982322"],
                "mother": "39a42816-cd19-4495-b263-ed892ac633e6"
            },
            "main": false
        }, {
            "id": "Q4115068",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "stepfather of Barack Obama (1935–1987)",
                "label": "Lolo Soetoro",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q766106"], "children": ["Q4382677"]},
            "main": false
        }, {
            "id": "Q2856335",
            "data": {
                "fn": "Stanley Armour",
                "ln": "Dunham",
                "desc": "maternal grandfather of Barack Obama",
                "label": "Stanley Armour Dunham",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q2856311"], "children": ["Q766106"]},
            "main": false
        }, {
            "id": "Q2856311",
            "data": {
                "fn": "Madelyn Lee",
                "ln": "Dunham Payne",
                "desc": "maternal grandmother of Barack Obama (1922-2008)",
                "label": "Madelyn Dunham",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q2856335"], "children": ["Q766106"]},
            "main": false
        }, {
            "id": "Q15070048",
            "data": {
                "fn": "Natasha Marian",
                "ln": "Obama",
                "desc": "daughter of former US President Barack Obama and Michelle Obama",
                "label": "Sasha Obama",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2a/Sasha_Obama_in_the_Rose_Garden_of_the_White_House_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q76", "mother": "Q13133", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q15070044",
            "data": {
                "fn": "Malia Ann",
                "ln": "Obama",
                "desc": "daughter of former US President Barack Obama and Michelle Obama",
                "label": "Malia Obama",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/55/Malia_Obama_in_the_Rose_Garden_of_the_White_House_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q76", "mother": "Q13133", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q76",
            "data": {
                "fn": "Barack Hussein",
                "ln": "Obama",
                "desc": "president of the United States from 2009 to 2017",
                "label": "Barack Obama",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8d/President_Barack_Obama.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q649593",
                "mother": "Q766106",
                "spouses": ["Q13133"],
                "children": ["Q15070048", "Q15070044"]
            },
            "main": false
        }, {
            "id": "Q13133",
            "data": {
                "fn": "Michelle LaVaughn",
                "ln": "Obama Robinson",
                "desc": "lawyer and former First Lady of the United States",
                "label": "Michelle Obama",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/53/Michelle_Obama_official_portrait_headshot.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q15982139",
                "mother": "Q6761976",
                "spouses": ["Q76"],
                "children": ["Q15070044", "Q15070048"]
            },
            "main": false
        }, {
            "id": "Q766106",
            "data": {
                "fn": "Ann",
                "ln": "Dunham",
                "desc": "American anthropologist, mother of Barack Obama (1942–1995)",
                "label": "Stanley Ann Dunham",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q2856335",
                "mother": "Q2856311",
                "spouses": ["Q4115068", "Q649593"],
                "children": ["Q76", "Q4382677"]
            },
            "main": false
        }, {
            "id": "Q649593",
            "data": {
                "fn": "Barack Hussein",
                "ln": "Obama",
                "desc": "Economist, father of Barack Obama jr. (1934–1982)",
                "label": "Barack Obama Sr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q15982328",
                "spouses": ["Q766106", "Q15982192", "Q15982183"],
                "children": ["Q15982326", "Q15982167", "Q15982309", "Q15982322", "Q76", "Q15982189", "Q15982321", "Q773197"]
            },
            "main": false
        }, {
            "id": "Q221997",
            "data": {
                "fn": "Jeb John Ellis",
                "ln": "Bush",
                "desc": "Governor of Florida from 1999 to 2007",
                "label": "Jeb Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/25/Gov_Jeb_Bush.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q4100648",
            "data": {
                "fn": "Dorothy",
                "ln": "Walker",
                "desc": "American politician (1901–1992)",
                "label": "Dorothy Walker Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2c/Prescott_and_Dorothy_Bush_1952.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q324742"], "children": ["Q23505"]},
            "main": false
        }, {
            "id": "Q324742",
            "data": {
                "fn": "Prescott",
                "ln": "Bush",
                "desc": "American politician, US Senator from Connecticut (1895-1972)",
                "label": "Prescott Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b9/PrescottBush.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q4100648"], "children": ["Q23505"]},
            "main": false
        }, {
            "id": "Q3305438",
            "data": {
                "fn": "Dorothy",
                "ln": "Koch",
                "desc": "American writer and philanthropist",
                "label": "Dorothy Bush Koch",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/ff/Doro_bush_koch_2006.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1375345",
            "data": {
                "fn": "Marvin",
                "ln": "Bush",
                "desc": "American businessman and son of George H. W. Bush",
                "label": "Marvin P. Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/92/Marvinbush.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q320829",
            "data": {
                "fn": "Neil",
                "ln": "Bush",
                "desc": "American businessman and investor",
                "label": "Neil Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/08/Neil_Bush_%285817515972%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23505",
            "data": {
                "fn": "George Herbert Walker",
                "ln": "Bush",
                "desc": "President of the United States from 1989 to 1993",
                "label": "George H. W. Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ee/George_H._W._Bush_presidential_portrait_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q324742",
                "mother": "Q4100648",
                "spouses": ["Q190628"],
                "children": ["Q207", "Q221997", "Q320829", "Q1375345", "Q3305438", "Q52159104"]
            },
            "main": false
        }, {
            "id": "Q52159104",
            "data": {
                "fn": "Pauline",
                "ln": "Bush",
                "desc": "second child of President George H.W. Bush and First Lady Barbara Bush",
                "label": "Robin Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/45/Robin_Bush_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q221997",
            "data": {
                "fn": "Jeb John Ellis",
                "ln": "Bush",
                "desc": "Governor of Florida from 1999 to 2007",
                "label": "Jeb Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/25/Gov_Jeb_Bush.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3305438",
            "data": {
                "fn": "Dorothy",
                "ln": "Koch",
                "desc": "American writer and philanthropist",
                "label": "Dorothy Bush Koch",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/ff/Doro_bush_koch_2006.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q52159104",
            "data": {
                "fn": "Pauline",
                "ln": "Bush",
                "desc": "second child of President George H.W. Bush and First Lady Barbara Bush",
                "label": "Robin Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/45/Robin_Bush_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q320829",
            "data": {
                "fn": "Neil",
                "ln": "Bush",
                "desc": "American businessman and investor",
                "label": "Neil Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/08/Neil_Bush_%285817515972%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1375345",
            "data": {
                "fn": "Marvin",
                "ln": "Bush",
                "desc": "American businessman and son of George H. W. Bush",
                "label": "Marvin P. Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/92/Marvinbush.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q23505", "mother": "Q190628", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6778454",
            "data": {
                "fn": "Marvin",
                "ln": "Pierce",
                "desc": "President of McCall Corporation and publisher of women's magazines Redbook and McCall's. (1893-1969)",
                "label": "Marvin Pierce",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b9/Marvin_%22Monk%22_Pierce%2C_Captain_of_the_1915_Miami_University_Football_team.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q28465164"], "children": ["Q190628"]},
            "main": false
        }, {
            "id": "Q152019",
            "data": {
                "fn": "Laura Lane",
                "ln": "Bush Welch",
                "desc": "First Lady of the United States from 2001 to 2009",
                "label": "Laura Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/70/Laura_Bush_portrait.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q18844162",
                "mother": "Q18844164",
                "spouses": ["Q207"],
                "children": ["Q153730", "Q153481"]
            },
            "main": false
        }, {
            "id": "Q152019",
            "data": {
                "fn": "Laura Lane",
                "ln": "Bush Welch",
                "desc": "First Lady of the United States from 2001 to 2009",
                "label": "Laura Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/70/Laura_Bush_portrait.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q18844162",
                "mother": "Q18844164",
                "spouses": ["Q207"],
                "children": ["Q153730", "Q153481"]
            },
            "main": false
        }, {
            "id": "Q18844164",
            "data": {
                "fn": "Jenna",
                "ln": "Welch",
                "desc": "mother of Laura Bush",
                "label": "Jenna Welch",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6a/Family-theater-2005.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q18844162"], "children": ["Q152019"]},
            "main": false
        }, {
            "id": "Q28465164",
            "data": {
                "fn": "Pauline",
                "ln": "Robinson",
                "desc": "mother of Barbara Bush, First Lady of the United States from 1989 to 1993, and mother-in-law of US president George H. W. Bush",
                "label": "Pauline Robinson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q6778454"], "children": ["Q190628"]},
            "main": false
        }, {
            "id": "Q18844162",
            "data": {
                "fn": "Harold",
                "ln": "Welch",
                "desc": "father of Laura Bush",
                "label": "Harold Welch",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q18844164"], "children": ["Q152019"]},
            "main": false
        }, {
            "id": "Q18844148",
            "data": {
                "fn": "Henry",
                "ln": "Hager",
                "desc": "husband of Jenna Bush Hager",
                "label": "Henry Hager",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q153481"], "children": ["Q18844153", "Q105146791", "Q105146793"]},
            "main": false
        }, {
            "id": "Q105146791",
            "data": {
                "fn": "no label Louise",
                "ln": "Hager",
                "desc": "granddaughter of U.S. president George W. Bush",
                "label": "Poppy Hager",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q18844148", "mother": "Q153481", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q105146793",
            "data": {
                "fn": "Henry Hal Chase",
                "ln": "Hager",
                "desc": "grandson of U.S. president George W. Bush",
                "label": "Hal Hager",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q18844148", "mother": "Q153481", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q18844153",
            "data": {
                "fn": "Margaret Mila",
                "ln": "Hager",
                "desc": "granddaughter of U.S. president George W. Bush",
                "label": "Mila Hager",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q18844148", "mother": "Q153481", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q131039895",
            "data": {
                "fn": "Edward Finn",
                "ln": "Coyne",
                "desc": "grandson of U.S. president George W. Bush",
                "label": "Edward Coyne",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q90803472", "mother": "Q153730", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q108747432",
            "data": {
                "fn": "Cora Georgia",
                "ln": "Coyne",
                "desc": "granddaughter of U.S. president George W. Bush",
                "label": "Cora Coyne",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q90803472", "mother": "Q153730", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q90803472",
            "data": {
                "fn": "Craig",
                "ln": "",
                "desc": "American actor and director",
                "label": "Craig Coyne",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q153730"], "children": ["Q108747432", "Q131039895"]},
            "main": false
        }, {
            "id": "Q190628",
            "data": {
                "fn": "Barbara",
                "ln": "Pierce Bush",
                "desc": "First Lady of the United States from 1989 to 1993",
                "label": "Barbara Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/02/Barbara_Bush_1991.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q6778454",
                "mother": "Q28465164",
                "spouses": ["Q23505"],
                "children": ["Q207", "Q221997", "Q320829", "Q1375345", "Q3305438", "Q52159104"]
            },
            "main": false
        }, {
            "id": "Q207",
            "data": {
                "fn": "George Walker",
                "ln": "Bush",
                "desc": "President of the United States from 2001 to 2009",
                "label": "George W. Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/d4/George-W-Bush.jpeg",
                "gender": "M"
            },
            "rels": {
                "father": "Q23505",
                "mother": "Q190628",
                "spouses": ["Q152019"],
                "children": ["Q153730", "Q153481"]
            },
            "main": false
        }, {
            "id": "Q23505",
            "data": {
                "fn": "George Herbert Walker",
                "ln": "Bush",
                "desc": "President of the United States from 1989 to 1993",
                "label": "George H. W. Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ee/George_H._W._Bush_presidential_portrait_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q324742",
                "mother": "Q4100648",
                "spouses": ["Q190628"],
                "children": ["Q207", "Q221997", "Q320829", "Q1375345", "Q3305438", "Q52159104"]
            },
            "main": false
        }, {
            "id": "Q153481",
            "data": {
                "fn": "Jenna Welch",
                "ln": "Bush Hager",
                "desc": "American journalist, author, and television personality",
                "label": "Jenna Bush Hager",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/06/Jenna_Bush_Hager_2017_2.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q207",
                "mother": "Q152019",
                "spouses": ["Q18844148"],
                "children": ["Q18844153", "Q105146791", "Q105146793"]
            },
            "main": false
        }, {
            "id": "Q153730",
            "data": {
                "fn": "Barbara",
                "ln": "Bush",
                "desc": "American health care activist; daughter of George W. Bush (born 1981)",
                "label": "Barbara Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/65/Barbara_Bush%2C_Philanthropy_Summit_2016_%283x4a%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q207",
                "mother": "Q152019",
                "spouses": ["Q90803472"],
                "children": ["Q108747432", "Q131039895"]
            },
            "main": false
        }, {
            "id": "Q152019",
            "data": {
                "fn": "Laura Lane",
                "ln": "Bush Welch",
                "desc": "First Lady of the United States from 2001 to 2009",
                "label": "Laura Bush",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/70/Laura_Bush_portrait.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q18844162",
                "mother": "Q18844164",
                "spouses": ["Q207"],
                "children": ["Q153730", "Q153481"]
            },
            "main": false
        }, {
            "id": "Q25310",
            "data": {
                "fn": "Robert Francis",
                "ln": "Kennedy",
                "desc": "United States Senator from New York from 1965 to 1968",
                "label": "Robert F. Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bd/Robert_F_Kennedy_crop.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q25310",
            "data": {
                "fn": "Robert Francis",
                "ln": "Kennedy",
                "desc": "United States Senator from New York from 1965 to 1968",
                "label": "Robert F. Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bd/Robert_F_Kennedy_crop.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q134549",
            "data": {
                "fn": "Edward Moore",
                "ln": "Kennedy",
                "desc": "United States Senator from Massachusetts from 1962 to 2009",
                "label": "Ted Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4d/Stevan_Kragujevic_%2C_Ted_Kenedi_u_Beogradu%2C_1974.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q432694",
            "data": {
                "fn": "Patricia Helen",
                "ln": "Kennedy Lawford",
                "desc": "American socialite (1924-2006); younger sister of John F. Kennedy",
                "label": "Patricia Kennedy Lawford",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/01/Patricia_Kennedy_Lawford_-_circa_1948.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q272401",
            "data": {
                "fn": "Jean Ann",
                "ln": "Kennedy Smith",
                "desc": "American diplomat and United States Ambassador to Ireland; younger sister of John F. Kennedy (1928-2020)",
                "label": "Jean Kennedy Smith",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b0/Jean_Kennedy_c1953.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q955405",
            "data": {
                "fn": "Patrick Joseph",
                "ln": "Kennedy",
                "desc": "American businessman and Massachusetts politician (1858–1929)",
                "label": "Patrick Joseph Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/35/PJ_Kennedy.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q75326857"], "children": ["Q313696"]},
            "main": false
        }, {
            "id": "Q165421",
            "data": {
                "fn": "Jacqueline Lee",
                "ln": "Bouvier Kennedy Onassis",
                "desc": "First Lady of the United States from 1961 to 1963",
                "label": "Jacqueline Kennedy Onassis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ea/Mrs_Kennedy_in_the_Diplomatic_Reception_Room_cropped.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q1776544",
                "mother": "Q3097958",
                "spouses": ["Q9696", "Q180455"],
                "children": ["Q75326753", "Q230303", "Q316064", "Q3290402"]
            },
            "main": false
        }, {
            "id": "Q180455",
            "data": {
                "fn": "Aristotle Socrates",
                "ln": "Onassis",
                "desc": "Greek shipping magnate",
                "label": "Aristotle Onassis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b7/Aristotle_Onassis_1967cr.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q165421"], "children": []},
            "main": false
        }, {
            "id": "Q21012765",
            "data": {
                "fn": "Tatiana Celia Kennedy",
                "ln": "Schlossberg Moran",
                "desc": "American journalist and author",
                "label": "Tatiana Schlossberg",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/7b/Tatiana_Schlossberg_in_2024.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q3048809", "mother": "Q230303", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q268799",
            "data": {
                "fn": "Kathleen Agnes",
                "ln": "Kennedy Cavendish",
                "desc": "American socialite, sister of John F. Kennedy (1920–1948)",
                "label": "Kathleen Cavendish",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/d5/Lady_Hartington.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q265595",
            "data": {
                "fn": "Rose Marie",
                "ln": "Kennedy",
                "desc": "younger sister of John F. Kennedy (1918–2005)",
                "label": "Rosemary Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/66/TheKennedyFamily1.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q505178",
            "data": {
                "fn": "Joseph Patrick",
                "ln": "Kennedy",
                "desc": "junior officer in the United States Navy and elder brother of John F. Kennedy",
                "label": "Joseph P. Kennedy Jr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/70/Lt._Joseph_P._Kennedy%2C_Jr._Navy.JPG",
                "gender": "M"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q15149340",
            "data": {
                "fn": "John Bouvier Kennedy",
                "ln": "Schlossberg",
                "desc": "American writer",
                "label": "Jack Schlossberg",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3c/Jack_Schlossberg_in_2024.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q3048809", "mother": "Q230303", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q21012764",
            "data": {
                "fn": "Rose Kennedy",
                "ln": "Schlossberg",
                "desc": "American filmmaker and artist",
                "label": "Rose Schlossberg",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/1e/Rose_Schlossberg_at_Yale_University_in_2015.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q3048809", "mother": "Q230303", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3048809",
            "data": {
                "fn": "Edwin Arthur",
                "ln": "Schlossberg",
                "desc": "American designer, artist, and author (born 1945)",
                "label": "Edwin Schlossberg",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/46/Edwin_Schlossberg_visits_Arlington_National_Cemetery_where_he_placed_a_wreath_at_the_Tomb_of_the_Unknown_Soldier_on_October_23%2C_2023.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q230303"], "children": ["Q21012764", "Q21012765", "Q15149340"]},
            "main": false
        }, {
            "id": "Q134549",
            "data": {
                "fn": "Edward Moore",
                "ln": "Kennedy",
                "desc": "United States Senator from Massachusetts from 1962 to 2009",
                "label": "Ted Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4d/Stevan_Kragujevic_%2C_Ted_Kenedi_u_Beogradu%2C_1974.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q272908",
            "data": {
                "fn": "Eunice Mary",
                "ln": "Kennedy Shriver",
                "desc": "American philanthropist; founder of the Special Olympics; sister of John F. Kennedy (1921–2009)",
                "label": "Eunice Kennedy Shriver",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4c/Eunice-Kennedy.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": ["Q317248"], "children": ["Q230654"]},
            "main": false
        }, {
            "id": "Q505178",
            "data": {
                "fn": "Joseph Patrick",
                "ln": "Kennedy",
                "desc": "junior officer in the United States Navy and elder brother of John F. Kennedy",
                "label": "Joseph P. Kennedy Jr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/70/Lt._Joseph_P._Kennedy%2C_Jr._Navy.JPG",
                "gender": "M"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q313696",
            "data": {
                "fn": "Joseph",
                "ln": "Kennedy",
                "desc": "American businessman, politician and diplomat (1888–1969)",
                "label": "Joseph P. Kennedy Sr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/83/Joseph_P._Kennedy%2C_Sr._1940.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q955405",
                "mother": "Q75326857",
                "spouses": ["Q236540"],
                "children": ["Q9696", "Q265595", "Q268799", "Q272908", "Q432694", "Q25310", "Q134549", "Q505178", "Q272401"]
            },
            "main": false
        }, {
            "id": "Q272401",
            "data": {
                "fn": "Jean Ann",
                "ln": "Kennedy Smith",
                "desc": "American diplomat and United States Ambassador to Ireland; younger sister of John F. Kennedy (1928-2020)",
                "label": "Jean Kennedy Smith",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b0/Jean_Kennedy_c1953.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q432694",
            "data": {
                "fn": "Patricia Helen",
                "ln": "Kennedy Lawford",
                "desc": "American socialite (1924-2006); younger sister of John F. Kennedy",
                "label": "Patricia Kennedy Lawford",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/01/Patricia_Kennedy_Lawford_-_circa_1948.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q265595",
            "data": {
                "fn": "Rose Marie",
                "ln": "Kennedy",
                "desc": "younger sister of John F. Kennedy (1918–2005)",
                "label": "Rosemary Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/66/TheKennedyFamily1.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q268799",
            "data": {
                "fn": "Kathleen Agnes",
                "ln": "Kennedy Cavendish",
                "desc": "American socialite, sister of John F. Kennedy (1920–1948)",
                "label": "Kathleen Cavendish",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/d5/Lady_Hartington.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q313696", "mother": "Q236540", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q966182",
            "data": {
                "fn": "John",
                "ln": "Fitzgerald",
                "desc": "Irish-American politician, Massachusetts (1863-1950)",
                "label": "John Francis Fitzgerald",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/J.F._Fitzgerald_LCCN2014714230_%283x4a%29.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q75326953"], "children": ["Q236540"]},
            "main": false
        }, {
            "id": "Q165421",
            "data": {
                "fn": "Jacqueline Lee",
                "ln": "Bouvier Kennedy Onassis",
                "desc": "First Lady of the United States from 1961 to 1963",
                "label": "Jacqueline Kennedy Onassis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ea/Mrs_Kennedy_in_the_Diplomatic_Reception_Room_cropped.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q1776544",
                "mother": "Q3097958",
                "spouses": ["Q9696", "Q180455"],
                "children": ["Q75326753", "Q230303", "Q316064", "Q3290402"]
            },
            "main": false
        }, {
            "id": "Q165421",
            "data": {
                "fn": "Jacqueline Lee",
                "ln": "Bouvier Kennedy Onassis",
                "desc": "First Lady of the United States from 1961 to 1963",
                "label": "Jacqueline Kennedy Onassis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ea/Mrs_Kennedy_in_the_Diplomatic_Reception_Room_cropped.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q1776544",
                "mother": "Q3097958",
                "spouses": ["Q9696", "Q180455"],
                "children": ["Q75326753", "Q230303", "Q316064", "Q3290402"]
            },
            "main": false
        }, {
            "id": "Q449173",
            "data": {
                "fn": "Carolyn",
                "ln": "Kennedy Bessette",
                "desc": "American publicist and socialite (1966–1999)",
                "label": "Carolyn Bessette-Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/74/Carolyn_Bessete_Kennedy_White_House_Correspondents%27_Dinner.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q316064"], "children": []},
            "main": false
        }, {
            "id": "Q165421",
            "data": {
                "fn": "Jacqueline Lee",
                "ln": "Bouvier Kennedy Onassis",
                "desc": "First Lady of the United States from 1961 to 1963",
                "label": "Jacqueline Kennedy Onassis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ea/Mrs_Kennedy_in_the_Diplomatic_Reception_Room_cropped.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q1776544",
                "mother": "Q3097958",
                "spouses": ["Q9696", "Q180455"],
                "children": ["Q75326753", "Q230303", "Q316064", "Q3290402"]
            },
            "main": false
        }, {
            "id": "Q75326857",
            "data": {
                "fn": "Mary",
                "ln": "",
                "desc": "(1857-1923)",
                "label": "Mary Augusta Hickey",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q955405"], "children": ["Q313696"]},
            "main": false
        }, {
            "id": "Q3097958",
            "data": {
                "fn": "Janet Norton",
                "ln": "Lee Bouvier Auchincloss Morris",
                "desc": "American socialite (1907-1989); mother of the former First Lady Jacqueline Kennedy and Princess Lee Radziwill.",
                "label": "Janet Lee Bouvier",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q1776544"], "children": ["Q165421"]},
            "main": false
        }, {
            "id": "Q1776544",
            "data": {
                "fn": "John Vernou",
                "ln": "Bouvier",
                "desc": "American socialite and Wall Street stockbroker (1891–1957)",
                "label": "John Vernou Bouvier III",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q3097958"], "children": ["Q165421"]},
            "main": false
        }, {
            "id": "Q75326953",
            "data": {
                "fn": "Mary",
                "ln": "",
                "desc": "(1865-1964)",
                "label": "Mary Josephine Hannon",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q966182"], "children": ["Q236540"]},
            "main": false
        }, {
            "id": "Q9696",
            "data": {
                "fn": "John Fitzgerald",
                "ln": "Kennedy",
                "desc": "President of the United States from 1961 to 1963",
                "label": "John F. Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c3/John_F._Kennedy%2C_White_House_color_photo_portrait.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q313696",
                "mother": "Q236540",
                "spouses": ["Q165421"],
                "children": ["Q316064", "Q3290402", "Q75326753", "Q230303"]
            },
            "main": false
        }, {
            "id": "Q236540",
            "data": {
                "fn": "Rose",
                "ln": "Kennedy",
                "desc": "American philanthropist and mother of John F. Kennedy",
                "label": "Rose Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/12/Rose_Kennedy_1967.JPG",
                "gender": "F"
            },
            "rels": {
                "father": "Q966182",
                "mother": "Q75326953",
                "spouses": ["Q313696"],
                "children": ["Q9696", "Q265595", "Q268799", "Q272908", "Q432694", "Q25310", "Q134549", "Q505178", "Q272401"]
            },
            "main": false
        }, {
            "id": "Q313696",
            "data": {
                "fn": "Joseph",
                "ln": "Kennedy",
                "desc": "American businessman, politician and diplomat (1888–1969)",
                "label": "Joseph P. Kennedy Sr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/83/Joseph_P._Kennedy%2C_Sr._1940.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q955405",
                "mother": "Q75326857",
                "spouses": ["Q236540"],
                "children": ["Q9696", "Q265595", "Q268799", "Q272908", "Q432694", "Q25310", "Q134549", "Q505178", "Q272401"]
            },
            "main": false
        }, {
            "id": "Q3290402",
            "data": {
                "fn": "Patrick",
                "ln": "Kennedy",
                "desc": "son of President John F. Kennedy (1963–1963)",
                "label": "Patrick Bouvier Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/5f/Gravestone_for_Patrick_Bouvier_Kennedy_in_Arlington_National_Cemetery.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q9696", "mother": "Q165421", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q316064",
            "data": {
                "fn": "John Fitzgerald",
                "ln": "Kennedy",
                "desc": "American attorney and magazine publisher",
                "label": "John F. Kennedy Jr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/dc/John_Kennedy_Jr_1999.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q9696", "mother": "Q165421", "spouses": ["Q449173"], "children": []},
            "main": false
        }, {
            "id": "Q230303",
            "data": {
                "fn": "Caroline",
                "ln": "Kennedy Schlossberg",
                "desc": "United States Ambassador to Australia since 2022",
                "label": "Caroline Kennedy",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/7c/Caroline_Kennedy%2C_U.S._Ambassador_2.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q9696",
                "mother": "Q165421",
                "spouses": ["Q3048809"],
                "children": ["Q21012764", "Q21012765", "Q15149340"]
            },
            "main": false
        }, {
            "id": "Q75326753",
            "data": {
                "fn": "Arabella",
                "ln": "Kennedy",
                "desc": "stillborn daughter of United States President John Kennedy and First Lady Jacqueline Kennedy",
                "label": "Arabella Kennedy",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q9696", "mother": "Q165421", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q165421",
            "data": {
                "fn": "Jacqueline Lee",
                "ln": "Bouvier Kennedy Onassis",
                "desc": "First Lady of the United States from 1961 to 1963",
                "label": "Jacqueline Kennedy Onassis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ea/Mrs_Kennedy_in_the_Diplomatic_Reception_Room_cropped.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q1776544",
                "mother": "Q3097958",
                "spouses": ["Q9696", "Q180455"],
                "children": ["Q75326753", "Q230303", "Q316064", "Q3290402"]
            },
            "main": false
        }, {
            "id": "Q6228508",
            "data": {
                "fn": "John",
                "ln": "",
                "desc": "American politician",
                "label": "John Dandridge",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/5b/Col._John_Dandridge_Jr.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q5478762"], "children": ["Q191789"]},
            "main": false
        }, {
            "id": "Q1701323",
            "data": {
                "fn": "John",
                "ln": "Custis",
                "desc": "American politician (1754-1781)",
                "label": "John Parke Custis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/55/Portrait_of_John_Parke_Custis_by_Charles_Willson_Peale%2C_ca._1774.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q1162023", "mother": "Q191789", "spouses": ["Q1325718"], "children": ["Q1508559"]},
            "main": false
        }, {
            "id": "Q21004273",
            "data": {
                "fn": "Martha",
                "ln": "Custis",
                "desc": "daughter of Martha Washington (1755-1773)",
                "label": "Martha Parke Custis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ad/Martha_Parke_Custis.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q1162023", "mother": "Q191789", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1162023",
            "data": {
                "fn": "Daniel",
                "ln": "Custis",
                "desc": "American planter and politician",
                "label": "Daniel Parke Custis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/5e/John_Wollaston_-_Daniel_Parke_Custis_%281711-1757%29.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q191789"], "children": ["Q1701323", "Q21004272", "Q21004271", "Q21004273"]},
            "main": false
        }, {
            "id": "Q7412891",
            "data": {
                "fn": "Samuel",
                "ln": "Washington",
                "desc": "colonial American officer and politician; brother of George Washington (1734-1781)",
                "label": "Samuel Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/de/Samuel_Washington_%281734-1781%29_portrait.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q299932",
            "data": {
                "fn": "Mary",
                "ln": "Custis Lee",
                "desc": "wife of Robert E. Lee (1808-1873)",
                "label": "Mary Anna Custis Lee",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e5/Mary_Custis_Lee.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q1508559", "mother": "Q1727412", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q969817",
            "data": {
                "fn": "Lawrence",
                "ln": "Washington",
                "desc": "American soldier, planter, politician, and prominent landowner in colonial Virginia; half-brother of George Washington",
                "label": "Lawrence Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e4/Lawrence_Washington.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q75764191", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q850421",
            "data": {
                "fn": "Elizabeth",
                "ln": "Washington Lewis",
                "desc": "(1733-1797); sister of George Washington",
                "label": "Betty Washington Lewis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fe/Betty_Washington_Lewis_-_John_Wollaston.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6219733",
            "data": {
                "fn": "John Augustine",
                "ln": "Washington",
                "desc": "member of the fifth Virginia Convention and founding member of the Mississippi Land Company; brother of George Washington",
                "label": "John Augustine Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c7/Col_John_Augustine_Washington_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q5083373",
            "data": {
                "fn": "Charles",
                "ln": "Washington",
                "desc": "youngest brother of George Washington",
                "label": "Charles Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e2/Charles_Washington_%281738-1799%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3219928",
            "data": {
                "fn": "Lawrence",
                "ln": "Washington",
                "desc": "colonial-era American lawyer, planter, soldier, politician, and the grandfather of George Washington",
                "label": "Lawrence Washington",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q3314035"], "children": ["Q768342"]},
            "main": false
        }, {
            "id": "Q1727412",
            "data": {
                "fn": "Mary",
                "ln": "",
                "desc": "American Episcopal lay leader (1788-1853)",
                "label": "Mary Lee Fitzhugh Custis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fd/Mary_Lee_Fitzhugh_Custis.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q1508559"], "children": ["Q299932"]},
            "main": false
        }, {
            "id": "Q1701323",
            "data": {
                "fn": "John",
                "ln": "Custis",
                "desc": "American politician (1754-1781)",
                "label": "John Parke Custis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/55/Portrait_of_John_Parke_Custis_by_Charles_Willson_Peale%2C_ca._1774.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q1162023", "mother": "Q191789", "spouses": ["Q1325718"], "children": ["Q1508559"]},
            "main": false
        }, {
            "id": "Q83489957",
            "data": {
                "fn": "Maria",
                "ln": "",
                "desc": "Great granddaughter of Martha Washington",
                "label": "Maria Carter Syphax",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/84/Maria_Carter_Syphax.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q1508559",
                "spouses": [],
                "children": [],
                "mother": "ae7240dd-1a30-4d7b-aef8-907a07695792"
            },
            "main": false
        }, {
            "id": "Q1325718",
            "data": {
                "fn": "Eleanor",
                "ln": "Calvert",
                "desc": "Calvert family member (1758-1811)",
                "label": "Eleanor Calvert",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/f9/Eleanor_Calvert.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q1701323"], "children": ["Q1508559"]},
            "main": false
        }, {
            "id": "Q21004271",
            "data": {
                "fn": "Daniel",
                "ln": "",
                "desc": "(1751-1754)",
                "label": "Daniel Parke Custis, Jr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q1162023", "mother": "Q191789", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q768342",
            "data": {
                "fn": "Augustine",
                "ln": "Washington",
                "desc": "(1694-1743) British-American planter, slave owner, and the father of George Washington",
                "label": "Augustine Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0b/Augustine_Washington.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q3219928",
                "mother": "Q3314035",
                "spouses": ["Q75764191", "Q458119"],
                "children": ["Q75764192", "Q969817", "Q4821226", "Q75764198", "Q23", "Q850421", "Q7412891", "Q6219733", "Q5083373", "Q75764188"]
            },
            "main": false
        }, {
            "id": "Q5478762",
            "data": {
                "fn": "Frances",
                "ln": "Jones",
                "desc": "American colonial (1710-1785)",
                "label": "Frances Jones",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q6228508"], "children": ["Q191789"]},
            "main": false
        }, {
            "id": "Q6219733",
            "data": {
                "fn": "John Augustine",
                "ln": "Washington",
                "desc": "member of the fifth Virginia Convention and founding member of the Mississippi Land Company; brother of George Washington",
                "label": "John Augustine Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c7/Col_John_Augustine_Washington_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q21004272",
            "data": {
                "fn": "Frances",
                "ln": "Custis",
                "desc": "(1753-1757)",
                "label": "Frances Custis",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q1162023", "mother": "Q191789", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q5083373",
            "data": {
                "fn": "Charles",
                "ln": "Washington",
                "desc": "youngest brother of George Washington",
                "label": "Charles Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e2/Charles_Washington_%281738-1799%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q7412891",
            "data": {
                "fn": "Samuel",
                "ln": "Washington",
                "desc": "colonial American officer and politician; brother of George Washington (1734-1781)",
                "label": "Samuel Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/de/Samuel_Washington_%281734-1781%29_portrait.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q850421",
            "data": {
                "fn": "Elizabeth",
                "ln": "Washington Lewis",
                "desc": "(1733-1797); sister of George Washington",
                "label": "Betty Washington Lewis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fe/Betty_Washington_Lewis_-_John_Wollaston.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3314035",
            "data": {
                "fn": "Mildred",
                "ln": "Gale",
                "desc": "Grandmother of George Washington",
                "label": "Mildred Gale",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q3219928"], "children": ["Q768342"]},
            "main": false
        }, {
            "id": "Q75764191",
            "data": {
                "fn": "Jane",
                "ln": "Butler",
                "desc": "first wife of Augustine Washington Sr.",
                "label": "Jane Butler",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q768342"], "children": ["Q75764192", "Q969817", "Q4821226", "Q75764198"]},
            "main": false
        }, {
            "id": "Q75764192",
            "data": {
                "fn": "Butler",
                "ln": "Washington",
                "desc": "(1715/16-1716); half-brother of George Washington",
                "label": "Butler Washington",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q75764191", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75764198",
            "data": {
                "fn": "Jane",
                "ln": "Washington",
                "desc": "(1721-1734); half-sister of George Washington",
                "label": "Jane Washington",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q768342", "mother": "Q75764191", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q104680414",
            "data": {
                "fn": "Lucy",
                "ln": "Branham",
                "desc": "Washington family slave",
                "label": "Lucy Harrison",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q1508559",
                "spouses": [],
                "children": [],
                "mother": "ae7240dd-1a30-4d7b-aef8-907a07695792"
            },
            "main": false
        }, {
            "id": "Q75764188",
            "data": {
                "fn": "Mildred",
                "ln": "Washington",
                "desc": "(1739-1740); sister of George Washington",
                "label": "Mildred Washington",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q4821226",
            "data": {
                "fn": "Augustine",
                "ln": "Washington",
                "desc": "American soldier, planter, and politician; half-brother of George Washington",
                "label": "Augustine Washington Jr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q75764191", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75764188",
            "data": {
                "fn": "Mildred",
                "ln": "Washington",
                "desc": "(1739-1740); sister of George Washington",
                "label": "Mildred Washington",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q16738459",
            "data": {
                "fn": "Joseph",
                "ln": "Ball",
                "desc": "(1649-1711)",
                "label": "Joseph Ball",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q19302079"], "children": ["Q458119"]},
            "main": false
        }, {
            "id": "Q19302079",
            "data": {
                "fn": "Mary",
                "ln": "Montague",
                "desc": "(died 1720)",
                "label": "Mary Montague",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q16738459"], "children": ["Q458119"]},
            "main": false
        }, {
            "id": "Q23",
            "data": {
                "fn": "George",
                "ln": "Washington",
                "desc": "president of the United States from 1789 to 1797",
                "label": "George Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b6/Gilbert_Stuart_Williamstown_Portrait_of_George_Washington.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q768342", "mother": "Q458119", "spouses": ["Q191789"], "children": []},
            "main": false
        }, {
            "id": "Q191789",
            "data": {
                "fn": "Martha",
                "ln": "Dandridge Custis Washington",
                "desc": "First Lady of the United States from 1789 to 1797",
                "label": "Martha Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/eb/Martha_Washington.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q6228508",
                "mother": "Q5478762",
                "spouses": ["Q23", "Q1162023"],
                "children": ["Q1701323", "Q21004271", "Q21004272", "Q21004273"]
            },
            "main": false
        }, {
            "id": "Q458119",
            "data": {
                "fn": "Mary",
                "ln": "Ball Washington",
                "desc": "mother of George Washington",
                "label": "Mary Ball Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/86/Mary_Ball_Washington%28Pine%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q16738459",
                "mother": "Q19302079",
                "spouses": ["Q768342"],
                "children": ["Q23", "Q850421", "Q6219733", "Q5083373", "Q7412891", "Q75764188"]
            },
            "main": false
        }, {
            "id": "Q768342",
            "data": {
                "fn": "Augustine",
                "ln": "Washington",
                "desc": "(1694-1743) British-American planter, slave owner, and the father of George Washington",
                "label": "Augustine Washington",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0b/Augustine_Washington.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q3219928",
                "mother": "Q3314035",
                "spouses": ["Q75764191", "Q458119"],
                "children": ["Q75764192", "Q969817", "Q4821226", "Q75764198", "Q23", "Q850421", "Q7412891", "Q6219733", "Q5083373", "Q75764188"]
            },
            "main": false
        }, {
            "id": "Q1508559",
            "data": {
                "fn": "George Washington",
                "ln": "Parke Custis",
                "desc": "adopted son of George Washington (1781-1857)",
                "label": "George Washington Parke Custis",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/99/George_Washington_Parke_Custis.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q1701323",
                "mother": "Q1325718",
                "spouses": ["Q1727412", "ae7240dd-1a30-4d7b-aef8-907a07695792"],
                "children": ["Q299932", "Q83489957", "Q104680414"]
            },
            "main": false
        }, {
            "id": "Q58461016",
            "data": {
                "fn": "Virginia",
                "ln": "",
                "desc": "grandchild of Thomas Jefferson",
                "label": "Virginia Jefferson Randolph Trist",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q881117",
            "data": {
                "fn": "Thomas",
                "ln": "Randolph",
                "desc": "American politician, son-in-law of Thomas Jefferson (1768–1828)",
                "label": "Thomas Mann Randolph",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4d/Thomas_Mann_Randolph.jpg",
                "gender": "M"
            },
            "rels": {
                "spouses": ["Q255159"],
                "children": ["Q60531110", "Q2425078", "Q105144879", "Q60536153", "Q60536111", "Q58461016", "Q60560219", "Q60560299", "Q817492", "Q1801037", "Q60531307", "Q325998"]
            },
            "main": false
        }, {
            "id": "Q2425078",
            "data": {
                "fn": "Thomas",
                "ln": "Randolph",
                "desc": "American planter and politician, grandson of Thomas Jefferson",
                "label": "Thomas Jefferson Randolph",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/08/Portrait_of_Thomas_Jefferson_Randolph.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q60536153",
            "data": {
                "fn": "Ellen",
                "ln": "Wayles Randolph",
                "desc": "granddaughter of Thomas Jefferson (1796-1876)",
                "label": "Ellen Wayles Randolph",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/f8/Ellen_Wayles_Randolph_%281796-1876%29_in_1861.png",
                "gender": "F"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q325998",
            "data": {
                "fn": "George",
                "ln": "Randolph",
                "desc": "Confederate Army general, grandson of Thomas Jefferson (1818-1867)",
                "label": "George Wythe Randolph",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/5e/George_Wythe_Randolph_1.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q60531110",
            "data": {
                "fn": "Anne Ann",
                "ln": "",
                "desc": "granddaughter of Thomas Jefferson",
                "label": "Anne Cary Randolph Bankhead",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b5/Anne_Cary_Randolph_Bankhead_by_James_Westhall_Ford.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q60531307",
            "data": {
                "fn": "Septimia",
                "ln": "Randolph Meikleham",
                "desc": "granddaughter of Thomas Jefferson",
                "label": "Septimia Randolph Meikleham",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/14/Septimia_Anne_Randolph_%281814-1887%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1801037",
            "data": {
                "fn": "Meriwether",
                "ln": "",
                "desc": "American politician (1810-1837)",
                "label": "Meriwether Lewis Randolph",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/1a/Meriwether_Lewis_Randolph.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q255159",
            "data": {
                "fn": "Martha",
                "ln": "Jefferson Randolph",
                "desc": "First Lady of the United States from 1801 to 1809",
                "label": "Martha Jefferson Randolph",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/78/Martha_Jefferson_Randolph_portrait.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q11812",
                "mother": "Q238001",
                "spouses": ["Q881117"],
                "children": ["Q2425078", "Q325998", "Q58461016", "Q60531110", "Q60531307", "Q817492", "Q1801037", "Q60536111", "Q60536153", "Q60560219", "Q60560299", "Q105144879"]
            },
            "main": false
        }, {
            "id": "Q60536111",
            "data": {
                "fn": "Cornelia",
                "ln": "Randolph",
                "desc": "granddaughter of Thomas Jefferson (1799-1871)",
                "label": "Cornelia J. Randolph",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q60560299",
            "data": {
                "fn": "James",
                "ln": "",
                "desc": "grandson of Thomas Jefferson",
                "label": "James Madison Randolph",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q238001",
            "data": {
                "fn": "Martha",
                "ln": "Jefferson Wayles Skelton",
                "desc": "First lady of Virginia, wife of Thomas Jefferson (1748-1782)",
                "label": "Martha Jefferson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Martha_Jefferson.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q16859631",
                "mother": "Q89491274",
                "spouses": ["Q11812", "Q96083046"],
                "children": ["Q255159", "Q6779916", "Q75766877", "Q75766879", "Q75766883", "Q75766886"]
            },
            "main": false
        }, {
            "id": "Q105144879",
            "data": {
                "fn": "Eleonora Ellen",
                "ln": "Randolph",
                "desc": "granddaughter of U.S. president Thomas Jefferson (1794-1795)",
                "label": "Eleonora Wayles Randolph",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q60560219",
            "data": {
                "fn": "Mary",
                "ln": "",
                "desc": "granddaughter of Thomas Jefferson",
                "label": "Mary Jefferson Randolph",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q817492",
            "data": {
                "fn": "Benjamin",
                "ln": "",
                "desc": "doctor, grandson of Thomas Jefferson (1808-1871)",
                "label": "Benjamin Franklin Randolph",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q881117", "mother": "Q255159", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q16738492",
            "data": {
                "fn": "Isham",
                "ln": "Randolph",
                "desc": "American planter (1684-1742)",
                "label": "Isham Randolph",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/20/ISHAM_RANDOLPH_%281685-1742%29.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q96083047"], "children": ["Q3161892"]},
            "main": false
        }, {
            "id": "Q60525643",
            "data": {
                "fn": "Martha",
                "ln": "",
                "desc": "sister of Thomas Jefferson (1746-1811)",
                "label": "Martha Jefferson Carr",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/a8/Martha_Jefferson_Carr.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q238001",
            "data": {
                "fn": "Martha",
                "ln": "Jefferson Wayles Skelton",
                "desc": "First lady of Virginia, wife of Thomas Jefferson (1748-1782)",
                "label": "Martha Jefferson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Martha_Jefferson.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q16859631",
                "mother": "Q89491274",
                "spouses": ["Q11812", "Q96083046"],
                "children": ["Q255159", "Q6779916", "Q75766877", "Q75766879", "Q75766883", "Q75766886"]
            },
            "main": false
        }, {
            "id": "Q96083046",
            "data": {
                "fn": "Bathurst",
                "ln": "Skelton",
                "desc": "attorney (1744-1768)",
                "label": "Bathurst Skelton",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q238001"], "children": []},
            "main": false
        }, {
            "id": "Q16859631",
            "data": {
                "fn": "John",
                "ln": "Wayles",
                "desc": "American lawyer and planter (1715-1773)",
                "label": "John Wayles",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "spouses": ["Q89491274", "f5279e46-91a4-467a-ab66-aea24d09ac96"],
                "children": ["Q238001", "Q257464"]
            },
            "main": false
        }, {
            "id": "Q60525643",
            "data": {
                "fn": "Martha",
                "ln": "",
                "desc": "sister of Thomas Jefferson (1746-1811)",
                "label": "Martha Jefferson Carr",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/a8/Martha_Jefferson_Carr.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q238001",
            "data": {
                "fn": "Martha",
                "ln": "Jefferson Wayles Skelton",
                "desc": "First lady of Virginia, wife of Thomas Jefferson (1748-1782)",
                "label": "Martha Jefferson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Martha_Jefferson.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q16859631",
                "mother": "Q89491274",
                "spouses": ["Q11812", "Q96083046"],
                "children": ["Q255159", "Q6779916", "Q75766877", "Q75766879", "Q75766883", "Q75766886"]
            },
            "main": false
        }, {
            "id": "Q89491274",
            "data": {
                "fn": "Martha",
                "ln": "Eppes",
                "desc": "(10 Apr 1712 - 5 Nov 1748)",
                "label": "Martha Eppes",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q16859631"], "children": ["Q238001"]},
            "main": false
        }, {
            "id": "Q1702116",
            "data": {
                "fn": "John",
                "ln": "Eppes",
                "desc": "American politician (1773-1823)",
                "label": "John Wayles Eppes",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/56/John_w_eppes.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q6779916"], "children": ["Q1441763"]},
            "main": false
        }, {
            "id": "Q1441763",
            "data": {
                "fn": "Francis",
                "ln": "Eppes",
                "desc": "American politician (1801-1881)",
                "label": "Francis W. Eppes",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/73/Francis_Wayles_Eppes.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q1702116", "mother": "Q6779916", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q257464",
            "data": {
                "fn": "Sally",
                "ln": "Hemings",
                "desc": "slave of Thomas Jefferson (c.1773–1835)",
                "label": "Sally Hemings",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/89/SallyHemings1804.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q16859631",
                "spouses": ["Q11812"],
                "children": ["Q5664155", "Q11239932", "Q5401423"],
                "mother": "f5279e46-91a4-467a-ab66-aea24d09ac96"
            },
            "main": false
        }, {
            "id": "Q7291842",
            "data": {
                "fn": "Randolph",
                "ln": "Jefferson",
                "desc": "Brother of Thomas Jefferson (1755-1815)",
                "label": "Randolph Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q238001",
            "data": {
                "fn": "Martha",
                "ln": "Jefferson Wayles Skelton",
                "desc": "First lady of Virginia, wife of Thomas Jefferson (1748-1782)",
                "label": "Martha Jefferson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Martha_Jefferson.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q16859631",
                "mother": "Q89491274",
                "spouses": ["Q11812", "Q96083046"],
                "children": ["Q255159", "Q6779916", "Q75766877", "Q75766879", "Q75766883", "Q75766886"]
            },
            "main": false
        }, {
            "id": "Q3376670",
            "data": {
                "fn": "Peter",
                "ln": "Jefferson",
                "desc": "father of American president Thomas Jefferson (1708-1757)",
                "label": "Peter Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q75766912",
                "mother": "Q75766914",
                "spouses": ["Q3161892"],
                "children": ["Q11812", "Q7291842", "Q60525643", "Q75766888", "Q75766890", "Q75766891", "Q75766894", "Q75766895", "Q6698378", "Q75766898"]
            },
            "main": false
        }, {
            "id": "Q75766898",
            "data": {
                "fn": "Anna Anne",
                "ln": "",
                "desc": "sister of US President Thomas Jefferson (1755-1828)",
                "label": "Anna Scott Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q238001",
            "data": {
                "fn": "Martha",
                "ln": "Jefferson Wayles Skelton",
                "desc": "First lady of Virginia, wife of Thomas Jefferson (1748-1782)",
                "label": "Martha Jefferson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Martha_Jefferson.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q16859631",
                "mother": "Q89491274",
                "spouses": ["Q11812", "Q96083046"],
                "children": ["Q255159", "Q6779916", "Q75766877", "Q75766879", "Q75766883", "Q75766886"]
            },
            "main": false
        }, {
            "id": "Q257464",
            "data": {
                "fn": "Sally",
                "ln": "Hemings",
                "desc": "slave of Thomas Jefferson (c.1773–1835)",
                "label": "Sally Hemings",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/89/SallyHemings1804.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q16859631", "spouses": [], "children": ["Q5664155", "Q11239932", "Q5401423"]},
            "main": false
        }, {
            "id": "Q257464",
            "data": {
                "fn": "Sally",
                "ln": "Hemings",
                "desc": "slave of Thomas Jefferson (c.1773–1835)",
                "label": "Sally Hemings",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/89/SallyHemings1804.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q16859631", "spouses": [], "children": ["Q5664155", "Q11239932", "Q5401423"]},
            "main": false
        }, {
            "id": "Q75766914",
            "data": {
                "fn": "Mary",
                "ln": "",
                "desc": "(1680-1715)",
                "label": "Mary Field",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q75766912"], "children": ["Q3376670"]},
            "main": false
        }, {
            "id": "Q75766894",
            "data": {
                "fn": "Peter",
                "ln": "Jefferson",
                "desc": "(1748-1748)",
                "label": "Peter Field Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766888",
            "data": {
                "fn": "Jane",
                "ln": "Jefferson",
                "desc": "(1740-1765)",
                "label": "Jane Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766890",
            "data": {
                "fn": "Mary",
                "ln": "Jefferson",
                "desc": "Thomas Jefferson's older sister b.1741",
                "label": "Mary Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6698378",
            "data": {
                "fn": "Lucy",
                "ln": "Jefferson Lewis",
                "desc": "Sister of Thomas Jefferson (1752-1810)",
                "label": "Lucy Jefferson Lewis",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766890",
            "data": {
                "fn": "Mary",
                "ln": "Jefferson",
                "desc": "Thomas Jefferson's older sister b.1741",
                "label": "Mary Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766898",
            "data": {
                "fn": "Anna Anne",
                "ln": "",
                "desc": "sister of US President Thomas Jefferson (1755-1828)",
                "label": "Anna Scott Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q7291842",
            "data": {
                "fn": "Randolph",
                "ln": "Jefferson",
                "desc": "Brother of Thomas Jefferson (1755-1815)",
                "label": "Randolph Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766912",
            "data": {
                "fn": "Thomas",
                "ln": "Jefferson",
                "desc": "(abt. 1679 - abt. 1731)",
                "label": "Thomas Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q75766914"], "children": ["Q3376670"]},
            "main": false
        }, {
            "id": "Q75766891",
            "data": {
                "fn": "Elizabeth",
                "ln": "Jefferson",
                "desc": "(1744-1773)",
                "label": "Elizabeth Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q96083047",
            "data": {
                "fn": "Jane",
                "ln": "Rogers",
                "desc": "(1698-1760)",
                "label": "Jane Rogers",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q16738492"], "children": ["Q3161892"]},
            "main": false
        }, {
            "id": "Q75766891",
            "data": {
                "fn": "Elizabeth",
                "ln": "Jefferson",
                "desc": "(1744-1773)",
                "label": "Elizabeth Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766888",
            "data": {
                "fn": "Jane",
                "ln": "Jefferson",
                "desc": "(1740-1765)",
                "label": "Jane Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766895",
            "data": {
                "fn": "",
                "ln": "Jefferson",
                "desc": "(1750-1750)",
                "label": "unnamed son Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6698378",
            "data": {
                "fn": "Lucy",
                "ln": "Jefferson Lewis",
                "desc": "Sister of Thomas Jefferson (1752-1810)",
                "label": "Lucy Jefferson Lewis",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6263272",
            "data": {
                "fn": "John",
                "ln": "",
                "desc": "Union Army colonel, grandson of Thomas Jefferson and Sally Hemings (1835-1892)",
                "label": "John Wayles Jefferson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0a/John_Wayles_Jefferson.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q5401423",
                "spouses": [],
                "children": [],
                "mother": "d3d58f7b-18d1-4be2-8469-ae41d328d57f"
            },
            "main": false
        }, {
            "id": "Q75766894",
            "data": {
                "fn": "Peter",
                "ln": "Jefferson",
                "desc": "(1748-1748)",
                "label": "Peter Field Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766895",
            "data": {
                "fn": "",
                "ln": "Jefferson",
                "desc": "(1750-1750)",
                "label": "unnamed son Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3376670", "mother": "Q3161892", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q58476763",
            "data": {
                "fn": "Ellen",
                "ln": "Hemings Roberts",
                "desc": "granddaughter of Thomas Jefferson and Sally Hemings (1856-1940)",
                "label": "Ellen Hemings Roberts",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q11239932",
                "spouses": [],
                "children": [],
                "mother": "4a668185-bf5e-4943-a56c-8f6e7b53966c"
            },
            "main": false
        }, {
            "id": "Q11812",
            "data": {
                "fn": "Thomas",
                "ln": "Jefferson",
                "desc": "president of the United States from 1801 to 1809",
                "label": "Thomas Jefferson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b1/Official_Presidential_portrait_of_Thomas_Jefferson_%28by_Rembrandt_Peale%2C_1800%29%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q3376670",
                "mother": "Q3161892",
                "spouses": ["Q238001", "Q257464"],
                "children": ["Q255159", "Q6779916", "Q75766877", "Q75766879", "Q75766883", "Q75766886", "Q11239932", "Q5664155", "Q5401423"]
            },
            "main": false
        }, {
            "id": "Q238001",
            "data": {
                "fn": "Martha",
                "ln": "Jefferson Wayles Skelton",
                "desc": "First lady of Virginia, wife of Thomas Jefferson (1748-1782)",
                "label": "Martha Jefferson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Martha_Jefferson.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q16859631",
                "mother": "Q89491274",
                "spouses": ["Q11812", "Q96083046"],
                "children": ["Q255159", "Q6779916", "Q75766877", "Q75766879", "Q75766883", "Q75766886"]
            },
            "main": false
        }, {
            "id": "Q255159",
            "data": {
                "fn": "Martha",
                "ln": "Jefferson Randolph",
                "desc": "First Lady of the United States from 1801 to 1809",
                "label": "Martha Jefferson Randolph",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/78/Martha_Jefferson_Randolph_portrait.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q11812",
                "mother": "Q238001",
                "spouses": ["Q881117"],
                "children": ["Q2425078", "Q325998", "Q58461016", "Q60531110", "Q60531307", "Q817492", "Q1801037", "Q60536111", "Q60536153", "Q60560219", "Q60560299", "Q105144879"]
            },
            "main": false
        }, {
            "id": "Q75766886",
            "data": {
                "fn": "Lucy Elizabeth",
                "ln": "Jefferson",
                "desc": "daughter of Thomas Jefferson (1782-1784)",
                "label": "Lucy Elizabeth Jefferson II",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q11812", "mother": "Q238001", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766883",
            "data": {
                "fn": "Lucy",
                "ln": "",
                "desc": "(1780-1781)",
                "label": "Lucy Elizabeth Jefferson I",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q11812", "mother": "Q238001", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766879",
            "data": {
                "fn": "",
                "ln": "Jefferson",
                "desc": "(1777-1777)",
                "label": "unnamed son Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q11812", "mother": "Q238001", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75766877",
            "data": {
                "fn": "Jane",
                "ln": "",
                "desc": "daughter of Thomas Jefferson (1774-1775)",
                "label": "Jane Randolph Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q11812", "mother": "Q238001", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6779916",
            "data": {
                "fn": "Mary",
                "ln": "Eppes",
                "desc": "Thomas Jefferson's younger child",
                "label": "Mary Jefferson Eppes",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q11812", "mother": "Q238001", "spouses": ["Q1702116"], "children": ["Q1441763"]},
            "main": false
        }, {
            "id": "Q3161892",
            "data": {
                "fn": "Jane",
                "ln": "Jefferson",
                "desc": "Thomas Jefferson's mother (1721-1776)",
                "label": "Jane Randolph Jefferson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q16738492",
                "mother": "Q96083047",
                "spouses": ["Q3376670"],
                "children": ["Q11812", "Q7291842", "Q60525643", "Q75766890", "Q75766891", "Q75766888", "Q75766894", "Q75766895", "Q75766898", "Q6698378"]
            },
            "main": false
        }, {
            "id": "Q3376670",
            "data": {
                "fn": "Peter",
                "ln": "Jefferson",
                "desc": "father of American president Thomas Jefferson (1708-1757)",
                "label": "Peter Jefferson",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q75766912",
                "mother": "Q75766914",
                "spouses": ["Q3161892"],
                "children": ["Q11812", "Q7291842", "Q60525643", "Q75766888", "Q75766890", "Q75766891", "Q75766894", "Q75766895", "Q6698378", "Q75766898"]
            },
            "main": false
        }, {
            "id": "Q11239932",
            "data": {
                "fn": "Madison",
                "ln": "",
                "desc": "American freed slave, son of Thomas Jefferson and Sally Hemings (1805-1877)",
                "label": "Madison Hemings",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q11812",
                "mother": "Q257464",
                "spouses": ["4a668185-bf5e-4943-a56c-8f6e7b53966c"],
                "children": ["Q58476763"]
            },
            "main": false
        }, {
            "id": "Q5664155",
            "data": {
                "fn": "Harriet",
                "ln": "",
                "desc": "daughter of Thomas Jefferson and Sally Hemings (1801–1863)",
                "label": "Harriet Hemings",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q11812", "mother": "Q257464", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q5401423",
            "data": {
                "fn": "Eston",
                "ln": "Hemings",
                "desc": "son of Thomas Jefferson and Sally Hemings (1808-1856)",
                "label": "Eston Hemings",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q11812",
                "mother": "Q257464",
                "spouses": ["d3d58f7b-18d1-4be2-8469-ae41d328d57f"],
                "children": ["Q6263272"]
            },
            "main": false
        }, {
            "id": "Q717406",
            "data": {
                "fn": "Vissarion",
                "ln": "Jughashvili",
                "desc": "father of Joseph Stalin (1850–1909)",
                "label": "Besarion Jughashvili",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/af/Vissarion_Jughashvili.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q56218448",
                "mother": "Q107291873",
                "spouses": ["Q241535"],
                "children": ["Q108723194", "Q108723531", "Q855"]
            },
            "main": false
        }, {
            "id": "Q241535",
            "data": {
                "fn": "Ekaterina Keke",
                "ln": "Geladze",
                "desc": "mother of Joseph Stalin",
                "label": "Keke Geladze",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/82/Ekaterina_Dzhugashvili.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q56219116",
                "mother": "Q56231163",
                "spouses": ["Q717406", "6fd3c966-f6ac-4844-89bf-c88d6685f3a9"],
                "children": ["Q22344319", "Q108723194", "Q108723531", "Q855"]
            },
            "main": false
        }, {
            "id": "Q228584",
            "data": {
                "fn": "Svetlana",
                "ln": "Alliluyeva Peters",
                "desc": "Joseph Stalin's daughter (1926–2011)",
                "label": "Svetlana Alliluyeva",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ea/Svetlana_Alliluyeva_1970.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q855",
                "mother": "Q233999",
                "spouses": ["Q4302955", "Q4178491", "Q6616173", "Q4409943"],
                "children": ["Q57469252", "Q98102305", "Q4062650"]
            },
            "main": false
        }, {
            "id": "Q4416801",
            "data": {
                "fn": "Artyom",
                "ln": "Sergeyev",
                "desc": "Soviet general, adopted son of Stalin (1921-2008)",
                "label": "Artem Sergeev",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q1332918",
                "spouses": [],
                "children": [],
                "mother": "f9ebe325-4ffd-4d26-87ca-d4232af18ffd"
            },
            "main": false
        }, {
            "id": "Q459216",
            "data": {
                "fn": "Vasily",
                "ln": "Stalin Jughashvili",
                "desc": "Soviet general and son of Joseph Stalin (1921–1962)",
                "label": "Vasily Dzhugashvili",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c9/Vasilij-stalin.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q855", "mother": "Q233999", "spouses": ["Q21636562"], "children": ["Q4099484"]},
            "main": false
        }, {
            "id": "Q105756206",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "illegitimate son of Joseph Stalin",
                "label": "Alexander Davydov",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q855", "mother": "Q105756153", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q108722703",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "first child of Joseph Stalin and Lidia Pereprygina",
                "label": "unnamed boy Jughashvili (1916)",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q855", "mother": "Q105756153", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3302174",
            "data": {
                "fn": "Konstantin",
                "ln": "Kuzakov",
                "desc": "illegitimate son of Joseph Stalin",
                "label": "Konstantin Kuzakov",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q855",
                "spouses": ["3211ab53-2865-46f4-b419-3f8c7a2f5a6c"],
                "children": ["Q56230675"],
                "mother": "ca9992b5-a8f6-40d5-b916-f6522f275a81"
            },
            "main": false
        }, {
            "id": "Q163816",
            "data": {
                "fn": "Yakov",
                "ln": "Jughashvili",
                "desc": "first child of Josef Stalin (1907–1943)",
                "label": "Yakov Dzhugashvili",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/17/%D0%94%D0%B6%D1%83%D0%B3%D0%B0%D1%88%D0%B2%D0%B8%D0%BB%D0%B8_%D0%AF%D0%BA%D0%BE%D0%B2_%D0%98%D0%BE%D1%81%D0%B8%D1%84%D0%BE%D0%B2%D0%B8%D1%87.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q855",
                "mother": "Q254673",
                "spouses": ["Q108724670", "Q56230882", "9a9dbd34-14f4-4e15-8780-f0c268ae7e4b"],
                "children": ["Q108724582", "Q1984422", "Q4160519"]
            },
            "main": false
        }, {
            "id": "Q233999",
            "data": {
                "fn": "Nadezhda Nadiyane",
                "ln": "Alliluyeva",
                "desc": "second wife of Joseph Stalin",
                "label": "Nadezhda Alliluyeva",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/a2/Nadezhda_Alliluyeva_1.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q4062652",
                "mother": "Q124719938",
                "spouses": ["Q855"],
                "children": ["Q228584", "Q459216"]
            },
            "main": false
        }, {
            "id": "Q254673",
            "data": {
                "fn": "Ekaterina",
                "ln": "Svanidze",
                "desc": "first wife of Josef Stalin (1885-1907)",
                "label": "Ekaterina Svanidze",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4d/Kato_Svanidze_Portrait.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q28038544", "mother": "Q28038546", "spouses": ["Q855"], "children": ["Q163816"]},
            "main": false
        }, {
            "id": "Q855",
            "data": {
                "fn": "Ioseb",
                "ln": "Stalin Jughashvili",
                "desc": "leader of the Soviet Union from 1924 to 1953",
                "label": "Joseph Stalin",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/JStalin_Secretary_general_CCCP_1942_flipped.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q717406",
                "mother": "Q241535",
                "spouses": ["Q254673", "Q233999", "Q105756153", "ca9992b5-a8f6-40d5-b916-f6522f275a81"],
                "children": ["Q163816", "Q459216", "Q228584", "Q108722703", "Q105756206", "Q3302174"]
            },
            "main": false
        }, {
            "id": "Q158314",
            "data": {
                "fn": "Klara",
                "ln": "juanbellako6 Pölzl",
                "desc": "mother of Adolf Hitler (1860–1907)",
                "label": "AL18600229-19071221",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8b/Klara_Hitler.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q22132490",
                "mother": "Q6216378",
                "spouses": ["Q78500"],
                "children": ["Q352", "Q84328", "Q22084744", "Q22084764", "Q22084775", "Q22084776"]
            },
            "main": false
        }, {
            "id": "Q78500",
            "data": {
                "fn": "Alois",
                "ln": "juanbellako6 Schicklgruber",
                "desc": "Austrian civil servant; father of Adolf Hitler (1837-1903)",
                "label": "Alois Hitler",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/41/Alois_Hitler.jpeg",
                "gender": "M"
            },
            "rels": {
                "father": "Q3319490",
                "mother": "Q2779550",
                "spouses": ["Q158314", "Q13637691", "Q22668115"],
                "children": ["Q352", "Q84328", "Q22084744", "Q22084764", "Q22084775", "Q22084776", "Q78643", "Q66225"]
            },
            "main": false
        }, {
            "id": "Q76433",
            "data": {
                "fn": "Eva Anna Paula",
                "ln": "juanbellako6 Braun",
                "desc": "photographer, longtime companion and later wife of Adolf Hitler (1912-1945)",
                "label": "Eva Braun",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6e/Eva_Braun_portrait_-_1_of_3_%28242-EB-26-01%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q22677145", "mother": "Q4613831", "spouses": ["Q352"], "children": []},
            "main": false
        }, {
            "id": "Q352",
            "data": {
                "fn": "Adolf",
                "ln": "juanbellako6",
                "desc": "dictator of Germany from 1933 to 1945",
                "label": "Adolf Hitler",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e1/Hitler_portrait_crop.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": ["Q76433"], "children": []},
            "main": false
        }, {
            "id": "Q2221868",
            "data": {
                "fn": "Andrew Henry",
                "ln": "Parker Bowles",
                "desc": "British Army officer; first husband of Queen Camilla",
                "label": "Andrew Parker Bowles",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q152239"], "children": ["Q3736070", "Q3743314"]},
            "main": false
        }, {
            "id": "Q17363684",
            "data": {
                "fn": "Rosalind Maud",
                "ln": "Cubitt Shand",
                "desc": "mother of Queen Consort Camilla of the United Kingdom",
                "label": "Rosalind Cubitt",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q327457"], "children": ["Q152239"]},
            "main": false
        }, {
            "id": "Q62938826",
            "data": {
                "fn": "Archie Harrison",
                "ln": "Mountbatten-Windsor Windsor",
                "desc": "son of Prince Harry, Duke of Sussex, and Meghan, Duchess of Sussex",
                "label": "Prince Archie of Sussex",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q152316", "mother": "Q3304418", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q256893",
            "data": {
                "fn": "Frances Ruth",
                "ln": "Roche Spencer Shand Kydd",
                "desc": "Mother of Diana, Princess of Wales (1936-2004)",
                "label": "Frances Shand Kydd",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q593671"], "children": ["Q9685"]},
            "main": false
        }, {
            "id": "Q593671",
            "data": {
                "fn": "John Edward",
                "ln": "Spencer",
                "desc": "British peer and father of Diana, Princess of Wales (1924-1992)",
                "label": "John Spencer, 8th Earl Spencer",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q256893"], "children": ["Q9685"]},
            "main": false
        }, {
            "id": "Q107125551",
            "data": {
                "fn": "Lilibet Diana",
                "ln": "Mountbatten-Windsor Windsor",
                "desc": "daughter of Prince Harry, Duke of Sussex and Meghan Markle, Duchess of Sussex",
                "label": "Princess Lilibet of Sussex",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q152316", "mother": "Q3304418", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q327457",
            "data": {
                "fn": "Bruce Middleton Hope",
                "ln": "Shand",
                "desc": "British Army officer",
                "label": "Bruce Shand",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q17363684"], "children": ["Q152239"]},
            "main": false
        }, {
            "id": "Q156531",
            "data": {
                "fn": "Andreas",
                "ln": "",
                "desc": "Greek prince; father of Prince Philip, Duke of Edinburgh (1882-1944)",
                "label": "Prince Andrew of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0c/Prince_Andrew_of_Greece.png",
                "gender": "M"
            },
            "rels": {
                "father": "Q17142",
                "mother": "Q155178",
                "spouses": ["Q116062"],
                "children": ["Q240317", "Q255382", "Q236196", "Q630371", "Q80976"]
            },
            "main": false
        }, {
            "id": "Q116062",
            "data": {
                "fn": "Victoria Alice Elizabeth Julia Marie",
                "ln": "",
                "desc": "Member of the House of Battenberg",
                "label": "Princess Alice of Battenberg",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3f/Alice_of_Greece.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q156531"], "children": ["Q80976", "Q240317", "Q255382", "Q236196", "Q630371"]},
            "main": false
        }, {
            "id": "Q9682",
            "data": {
                "fn": "Elizabeth Alexandra Mary",
                "ln": "Windsor",
                "desc": "Queen of the United Kingdom from 1952 to 2022",
                "label": "Elizabeth II",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b6/Queen_Elizabeth_II_in_March_2015.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q280856",
                "mother": "Q10633",
                "spouses": ["Q80976"],
                "children": ["Q43274", "Q151754", "Q153330", "Q154920"]
            },
            "main": false
        }, {
            "id": "Q3743314",
            "data": {
                "fn": "Laura Rose",
                "ln": "Lopes Parker Bowles",
                "desc": "British art curator (born 1978); daughter of Queen Camilla of the United Kingdom",
                "label": "Laura Lopes",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e8/Laura_Parker_Bowles_by_Reginald_Gray.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q2221868", "mother": "Q152239", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3736070",
            "data": {
                "fn": "Thomas Henry Charles",
                "ln": "Parker Bowles",
                "desc": "son of Camilla, queen of the United Kingdom",
                "label": "Tom Parker Bowles",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6c/Tomparkerbowles_%28cropped%29_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q2221868", "mother": "Q152239", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q38668629",
            "data": {
                "fn": "Louis Arthur Charles",
                "ln": "Windsor",
                "desc": "youngest child of William, Prince of Wales, and Catherine, Princess of Wales",
                "label": "Prince Louis of Wales",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/db/Queen_Elizabeth_II_Platinum_Jubilee_2022_-_Platinum_Pageant_%2852124830349%29_%28cropped3%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q36812", "mother": "Q10479", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q9685",
            "data": {
                "fn": "Diana Frances",
                "ln": "Spencer Mountbatten-Windsor",
                "desc": "member of the British royal family and Princess of Wales (1961–1997)",
                "label": "Diana, Princess of Wales",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/f3/Diana%2C_Princess_of_Wales_1997_%282%29_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q593671",
                "mother": "Q256893",
                "spouses": ["Q43274"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q10479",
            "data": {
                "fn": "Catherine Elizabeth",
                "ln": "Middleton Windsor",
                "desc": "member of the British Royal Family and princess of Wales since 2022",
                "label": "Catherine, Princess of Wales",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bf/Princess_of_Wales_in_2023_%28cropped%2903.JPG",
                "gender": "F"
            },
            "rels": {"spouses": ["Q36812"], "children": ["Q13590412", "Q18002970", "Q38668629"]},
            "main": false
        }, {
            "id": "Q3304418",
            "data": {
                "fn": "Rachel Meghan",
                "ln": "Markle Mountbatten-Windsor",
                "desc": "member of the British royal family and Duchess of Sussex since 2018",
                "label": "Meghan, Duchess of Sussex",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9d/SXSW-2024-OB7A9986-alih-Meghan%2C_Duchess_of_Sussex_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q152316"], "children": ["Q62938826", "Q107125551"]},
            "main": false
        }, {
            "id": "Q9685",
            "data": {
                "fn": "Diana Frances",
                "ln": "Spencer Mountbatten-Windsor",
                "desc": "member of the British royal family and Princess of Wales (1961–1997)",
                "label": "Diana, Princess of Wales",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/f3/Diana%2C_Princess_of_Wales_1997_%282%29_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q593671",
                "mother": "Q256893",
                "spouses": ["Q43274"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q13590412",
            "data": {
                "fn": "George Alexander Louis",
                "ln": "Windsor",
                "desc": "British prince, child of William, Prince of Wales, and Catherine, Princess of Wales (born 2013)",
                "label": "Prince George of Wales",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/16/Prince_George_at_Queen_Elizabeth_II_Platinum_Jubilee_2022_-_Platinum_Pageant.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q36812", "mother": "Q10479", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q18002970",
            "data": {
                "fn": "Charlotte Rose Diana",
                "ln": "Windsor",
                "desc": "daughter of William, Prince of Wales, and Catherine, Princess of Wales",
                "label": "Princess Charlotte of Wales",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/18/Queen_Elizabeth_II_Platinum_Jubilee_2022_-_Platinum_Pageant_%2852124830349%29_%28cropped2%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q36812", "mother": "Q10479", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q151754",
            "data": {
                "fn": "Anne Elizabeth Alice Louise",
                "ln": "Windsor",
                "desc": "daughter of Queen Elizabeth II and Prince Philip, Duke of Edinburgh",
                "label": "Anne, Princess Royal",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/80/Princess_Anne_Wellington_2023.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q80976", "mother": "Q9682", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q154920",
            "data": {
                "fn": "Edward Antony Richard Louis",
                "ln": "Mountbatten-Windsor",
                "desc": "Youngest child of Elizabeth II and Prince Philip, Duke of Edinburgh (born 1964)",
                "label": "Prince Edward, Duke of Edinburgh",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fe/Prince_Edward_2022.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q80976", "mother": "Q9682", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q153330",
            "data": {
                "fn": "Andrew Albert Christian Edward",
                "ln": "Mountbatten-Windsor",
                "desc": "second son and third child of Queen Elizabeth II and Prince Philip, Duke of Edinburgh (born 1960)",
                "label": "Prince Andrew, Duke of York",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3e/Pr%C3%ADncipe_Andr%C3%A9_do_Reino_Unido.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q80976", "mother": "Q9682", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q43274",
            "data": {
                "fn": "Charles Philip Arthur George",
                "ln": "Mountbatten-Windsor",
                "desc": "King of the United Kingdom and other Commonwealth realms since 2022",
                "label": "Charles III",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ac/King_Charles_III_%28July_2023%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q80976",
                "mother": "Q9682",
                "spouses": ["Q9685", "Q152239"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q10633",
            "data": {
                "fn": "Elizabeth Angela Marguerite",
                "ln": "Bowes-Lyon Windsor",
                "desc": "Queen consort of the United Kingdom from 1936 to 1952",
                "label": "Queen Elizabeth, The Queen Mother",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2d/Queen_Elizabeth_the_Queen_Mother_portrait.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q335159",
                "mother": "Q238820",
                "spouses": ["Q280856"],
                "children": ["Q9682", "Q153815"]
            },
            "main": false
        }, {
            "id": "Q335159",
            "data": {
                "fn": "Claude",
                "ln": "Bowes-Lyon",
                "desc": "British aristocrat (1855-1944); father of Queen Elizabeth The Queen Mother; maternal grandfather of Elizabeth II",
                "label": "Claude Bowes-Lyon, 14th Earl of Strathmore and Kinghorne",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/37/Claude_Bowes-Lyon%2C_14th_Earl_of_Strathmore_and_Kinghorne.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q741870",
                "mother": "Q2592020",
                "spouses": ["Q238820"],
                "children": ["Q10633", "Q6779476", "Q1758535", "Q75411", "Q5444165", "Q63806478", "Q75381406", "Q75381408", "Q5231604", "Q7367831"]
            },
            "main": false
        }, {
            "id": "Q238820",
            "data": {
                "fn": "Cecilia Nina",
                "ln": "Cavendish-Bentinck Bowes-Lyon",
                "desc": "Countess of Strathmore and Kinghorne (1862-1938); mother of Queen Elizabeth The Queen Mother; maternal grandmother of Elizabeth II",
                "label": "Cecilia Bowes-Lyon, Countess of Strathmore and Kinghorne",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c4/Cecilia_Bowes-Lyon_from_wedding_portrait_of_Duke_and_Duchess_of_York_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q128341",
                "mother": "Q1031989",
                "spouses": ["Q335159"],
                "children": ["Q10633", "Q6779476", "Q1758535", "Q75411", "Q5444165", "Q7367831", "Q63806478", "Q75381406", "Q75381408", "Q5231604"]
            },
            "main": false
        }, {
            "id": "Q153815",
            "data": {
                "fn": "Margaret Rose",
                "ln": "Windsor Armstrong-Jones",
                "desc": "younger daughter of King George VI and Queen Elizabeth The Queen Mother (1930–2002)",
                "label": "Princess Margaret, Countess of Snowdon",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e1/Princess_Margaret.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q280856",
                "mother": "Q10633",
                "spouses": ["Q335260"],
                "children": ["Q1091237", "Q1040807"]
            },
            "main": false
        }, {
            "id": "Q75381408",
            "data": {
                "fn": "Alexander",
                "ln": "",
                "desc": "(1887-1911)",
                "label": "Alexander Bowes-Lyon",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75381406",
            "data": {
                "fn": "Violet Hyacinth",
                "ln": "Bowes-Lyon",
                "desc": "(1882-1893); elder sister of Queen Elizabeth The Queen Mother; aunt of Elizabeth II",
                "label": "Violet Bowes-Lyon",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75411",
            "data": {
                "fn": "John Herbert",
                "ln": "Bowes-Lyon",
                "desc": "English cricketer and stock broker (1886-1930)",
                "label": "John Bowes-Lyon",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q63806478",
            "data": {
                "fn": "Michael Claude Hamilton",
                "ln": "Bowes-Lyon",
                "desc": "son of 14th Earl of Strathmore and Kinghorne (1893-1953); brother of Queen Elizabeth, the Queen Mother; uncle of Elizabeth II",
                "label": "Michael Bowes-Lyon",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q5444165",
            "data": {
                "fn": "Fergus",
                "ln": "Bowes-Lyon",
                "desc": "British Army officer (1889-1915); elder brother of Queen Elizabeth The Queen Mother; uncle of Elizabeth II",
                "label": "Fergus Bowes-Lyon",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75381406",
            "data": {
                "fn": "Violet Hyacinth",
                "ln": "Bowes-Lyon",
                "desc": "(1882-1893); elder sister of Queen Elizabeth The Queen Mother; aunt of Elizabeth II",
                "label": "Violet Bowes-Lyon",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q5444165",
            "data": {
                "fn": "Fergus",
                "ln": "Bowes-Lyon",
                "desc": "British Army officer (1889-1915); elder brother of Queen Elizabeth The Queen Mother; uncle of Elizabeth II",
                "label": "Fergus Bowes-Lyon",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q128341",
            "data": {
                "fn": "Charles",
                "ln": "Cavendish-Bentinck",
                "desc": "great-grandfather of Queen Elizabeth II of the United Kingdom (1817-1865)",
                "label": "Charles Cavendish-Bentinck",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q1031989"], "children": ["Q238820"]},
            "main": false
        }, {
            "id": "Q63806478",
            "data": {
                "fn": "Michael Claude Hamilton",
                "ln": "Bowes-Lyon",
                "desc": "son of 14th Earl of Strathmore and Kinghorne (1893-1953); brother of Queen Elizabeth, the Queen Mother; uncle of Elizabeth II",
                "label": "Michael Bowes-Lyon",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75411",
            "data": {
                "fn": "John Herbert",
                "ln": "Bowes-Lyon",
                "desc": "English cricketer and stock broker (1886-1930)",
                "label": "John Bowes-Lyon",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75381408",
            "data": {
                "fn": "Alexander",
                "ln": "",
                "desc": "(1887-1911)",
                "label": "Alexander Bowes-Lyon",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1040807",
            "data": {
                "fn": "Sarah Frances Elizabeth",
                "ln": "Armstrong-Jones Chatto",
                "desc": "noblewoman; daughter of Princess Margaret, Countess of Snowdon; niece of Queen Elizabeth II",
                "label": "Lady Sarah Chatto",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q335260", "mother": "Q153815", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q7367831",
            "data": {
                "fn": "Rose Constance",
                "ln": "Bowes-Lyon Leveson-Gower",
                "desc": "Countess Granville (1890-1967)",
                "label": "Rose Leveson-Gower, Countess Granville",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e8/Rose_Constance_Bowes-Lyon.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1758535",
            "data": {
                "fn": "Patrick",
                "ln": "Bowes-Lyon",
                "desc": "British peer (1884-1949); elder brother of Queen Elizabeth The Queen Mother; uncle of Elizabeth II",
                "label": "Patrick Bowes-Lyon, 15th Earl of Strathmore and Kinghorne",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/a0/Patrick_Bowes-Lyon%2C_15th_Earl_of_Strathmore_and_Kinghorne%2C_in_1923.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6779476",
            "data": {
                "fn": "Mary Frances",
                "ln": "Elphinstone",
                "desc": "(1883-1961); sister of Queen Elizabeth The Queen Mother, maternal aunt and godmother of Elizabeth II",
                "label": "Mary Elphinstone, Lady Elphinstone",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/ff/Lady_Elphinstone_wife_of_16th_Baron%2C_n%C3%A9e_Lady_Mary_Frances_Bowes_Lyon.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q5231604",
            "data": {
                "fn": "David",
                "ln": "Bowes-Lyon",
                "desc": "British noble (1902-1961)",
                "label": "David Bowes-Lyon",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8f/David_Bowes-Lyon.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q238820",
            "data": {
                "fn": "Cecilia Nina",
                "ln": "Cavendish-Bentinck Bowes-Lyon",
                "desc": "Countess of Strathmore and Kinghorne (1862-1938); mother of Queen Elizabeth The Queen Mother; maternal grandmother of Elizabeth II",
                "label": "Cecilia Bowes-Lyon, Countess of Strathmore and Kinghorne",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c4/Cecilia_Bowes-Lyon_from_wedding_portrait_of_Duke_and_Duchess_of_York_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q128341",
                "mother": "Q1031989",
                "spouses": ["Q335159"],
                "children": ["Q10633", "Q6779476", "Q1758535", "Q75411", "Q5444165", "Q7367831", "Q63806478", "Q75381406", "Q75381408", "Q5231604"]
            },
            "main": false
        }, {
            "id": "Q1031989",
            "data": {
                "fn": "Caroline",
                "ln": "Burnaby",
                "desc": "great-grandmother of Queen Elizabeth II of the United Kingdom",
                "label": "Louisa Burnaby",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8a/Luisa_Burnaby.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q128341"], "children": ["Q238820"]},
            "main": false
        }, {
            "id": "Q5231604",
            "data": {
                "fn": "David",
                "ln": "Bowes-Lyon",
                "desc": "British noble (1902-1961)",
                "label": "David Bowes-Lyon",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8f/David_Bowes-Lyon.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q7367831",
            "data": {
                "fn": "Rose Constance",
                "ln": "Bowes-Lyon Leveson-Gower",
                "desc": "Countess Granville (1890-1967)",
                "label": "Rose Leveson-Gower, Countess Granville",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e8/Rose_Constance_Bowes-Lyon.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1758535",
            "data": {
                "fn": "Patrick",
                "ln": "Bowes-Lyon",
                "desc": "British peer (1884-1949); elder brother of Queen Elizabeth The Queen Mother; uncle of Elizabeth II",
                "label": "Patrick Bowes-Lyon, 15th Earl of Strathmore and Kinghorne",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/a0/Patrick_Bowes-Lyon%2C_15th_Earl_of_Strathmore_and_Kinghorne%2C_in_1923.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2592020",
            "data": {
                "fn": "Frances Dora",
                "ln": "Smith Bowes-Lyon",
                "desc": "British aristocrat (1832-1922); great-grandmother of Elizabeth II",
                "label": "Frances Bowes-Lyon, Countess of Strathmore and Kinghorne",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/47/Frances_Bowes-Lyon.png",
                "gender": "F"
            },
            "rels": {"spouses": ["Q741870"], "children": ["Q335159"]},
            "main": false
        }, {
            "id": "Q6779476",
            "data": {
                "fn": "Mary Frances",
                "ln": "Elphinstone",
                "desc": "(1883-1961); sister of Queen Elizabeth The Queen Mother, maternal aunt and godmother of Elizabeth II",
                "label": "Mary Elphinstone, Lady Elphinstone",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/ff/Lady_Elphinstone_wife_of_16th_Baron%2C_n%C3%A9e_Lady_Mary_Frances_Bowes_Lyon.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q335159", "mother": "Q238820", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q741870",
            "data": {
                "fn": "Claude",
                "ln": "Bowes-Lyon Lyon-Bowes",
                "desc": "British earl (1824-1904); great-grandfather of Elizabeth II",
                "label": "Claude Bowes-Lyon, 13th Earl of Strathmore and Kinghorne",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/61/Claud_Bowes-Lyon%2C_13th_Earl_of_Strathmore_and_Kinghorne.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q2592020"], "children": ["Q335159"]},
            "main": false
        }, {
            "id": "Q1091237",
            "data": {
                "fn": "David Albert Charles",
                "ln": "Armstrong-Jones",
                "desc": "English furniture designer, chairman of Christie's UK; son of Princess Margaret, Countess of Snowdon; nephew of Queen Elizabeth II",
                "label": "David Armstrong-Jones, 2nd Earl of Snowdon",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/bb/Procession_to_Lying-in-State_of_Elizabeth_II_at_Westminster_Hall_-_86_-_David_Armstrong-Jones_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q335260", "mother": "Q153815", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q335260",
            "data": {
                "fn": "Antony Charles Robert",
                "ln": "Armstrong-Jones",
                "desc": "Welsh photographer and filmmaker; ex-husband of Princess Margaret (1930-2017)",
                "label": "Antony Armstrong-Jones, 1st Earl of Snowdon",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/98/Antony_Armstrong-Jones_1965_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q153815"], "children": ["Q1091237", "Q1040807"]},
            "main": false
        }, {
            "id": "Q280856",
            "data": {
                "fn": "Albert Frederick Arthur George",
                "ln": "Windsor",
                "desc": "King of the United Kingdom from 1936 to 1952, Emperor of India from 1936 to 1948 (1895–1952)",
                "label": "George VI",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e0/King_George_VI_LOC_matpc.14736_A_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": ["Q10633"], "children": ["Q9682", "Q153815"]},
            "main": false
        }, {
            "id": "Q269412",
            "data": {
                "fn": "George Frederick Ernest Albert",
                "ln": "Windsor",
                "desc": "King of the United Kingdom and the British Dominions, and Emperor of India (1865–1936)",
                "label": "George V",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c9/King_George_1923_LCCN2014715558_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q20875",
                "mother": "Q152260",
                "spouses": ["Q76927"],
                "children": ["Q590227", "Q280856", "Q233913", "Q117174", "Q160770", "Q310488"]
            },
            "main": false
        }, {
            "id": "Q76927",
            "data": {
                "fn": "Victoria Mary Augusta Louise Pauline Claudine Agnes Olga",
                "ln": "",
                "desc": "queen consort of the United Kingdom from 1910 to 1936",
                "label": "Mary of Teck",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fe/Queenmaryformalportrait_edit3.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q535987",
                "mother": "Q233997",
                "spouses": ["Q269412"],
                "children": ["Q590227", "Q280856", "Q233913", "Q117174", "Q160770", "Q310488"]
            },
            "main": false
        }, {
            "id": "Q310488",
            "data": {
                "fn": "John",
                "ln": "",
                "desc": "Son of King George V",
                "label": "Prince John of the United Kingdom",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/29/Prince_John%2C_Bain_News_Service.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q117174",
            "data": {
                "fn": "Henry William Frederick Albert",
                "ln": "Windsor",
                "desc": "Governor-General of Australia from 1945 to 1947",
                "label": "Prince Henry, Duke of Gloucester",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/57/Dukeofgloucester.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q233913",
            "data": {
                "fn": "Victoria Alexandra Alice Mary",
                "ln": "Windsor",
                "desc": "Member of the House of Windsor",
                "label": "Mary, Princess Royal and Countess of Harewood",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/aa/Princess_Mary%2C_Countess_of_Harewood.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q76927",
            "data": {
                "fn": "Victoria Mary Augusta Louise Pauline Claudine Agnes Olga",
                "ln": "",
                "desc": "queen consort of the United Kingdom from 1910 to 1936",
                "label": "Mary of Teck",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fe/Queenmaryformalportrait_edit3.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q535987",
                "mother": "Q233997",
                "spouses": ["Q269412"],
                "children": ["Q590227", "Q280856", "Q233913", "Q117174", "Q160770", "Q310488"]
            },
            "main": false
        }, {
            "id": "Q160770",
            "data": {
                "fn": "George Edmund Edward Alexander",
                "ln": "",
                "desc": "Member of the House of Windsor (1902–1942)",
                "label": "Prince George, Duke of Kent",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8c/Prince_George%2C_Duke_of_Kent.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q152260",
            "data": {
                "fn": "Alexandra Caroline Marie Charlotte Louise Julia",
                "ln": "",
                "desc": "Queen consort of the United Kingdom from 1901 to 1910",
                "label": "Alexandra of Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/5f/Alexandra_of_Denmark02.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q151305", "mother": "Q166028", "spouses": ["Q20875"], "children": ["Q269412"]},
            "main": false
        }, {
            "id": "Q20875",
            "data": {
                "fn": "Albert Edward",
                "ln": "House of Saxe-Coburg and Gotha",
                "desc": "King of the United Kingdom and the British Dominions, and Emperor of India (1841–1910)",
                "label": "Edward VII",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/7b/King-Edward-VII_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q152260"], "children": ["Q269412"]},
            "main": false
        }, {
            "id": "Q310488",
            "data": {
                "fn": "John",
                "ln": "",
                "desc": "Son of King George V",
                "label": "Prince John of the United Kingdom",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/29/Prince_John%2C_Bain_News_Service.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q535987",
            "data": {
                "fn": "Franz",
                "ln": "",
                "desc": "British Army general (1837–1900)",
                "label": "Francis, Duke of Teck",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/1a/Prince_Francis%2C_Duke_of_Teck.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q233997"], "children": ["Q76927"]},
            "main": false
        }, {
            "id": "Q233913",
            "data": {
                "fn": "Victoria Alexandra Alice Mary",
                "ln": "Windsor",
                "desc": "Member of the House of Windsor",
                "label": "Mary, Princess Royal and Countess of Harewood",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/aa/Princess_Mary%2C_Countess_of_Harewood.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q590227",
            "data": {
                "fn": "Edward Albert Christian George Andrew Patrick David",
                "ln": "Windsor",
                "desc": "King of the United Kingdom and the British Dominions, Emperor of India (1936)",
                "label": "Edward VIII",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0a/Duke_and_Duchess_of_Windsor_-_Google_Art_Project_%28Duke_cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q160770",
            "data": {
                "fn": "George Edmund Edward Alexander",
                "ln": "",
                "desc": "Member of the House of Windsor (1902–1942)",
                "label": "Prince George, Duke of Kent",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/8c/Prince_George%2C_Duke_of_Kent.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q233997",
            "data": {
                "fn": "Mary Adelaide Wilhelmine Elizabeth",
                "ln": "",
                "desc": "British aristocrat (1833–1897), mother of Mary of Teck",
                "label": "Princess Mary Adelaide of Cambridge",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/54/Princess_Mary_Adelaide%2C_Duchess_of_Teck_%281833%E2%80%931897%29.png",
                "gender": "F"
            },
            "rels": {"spouses": ["Q535987"], "children": ["Q76927"]},
            "main": false
        }, {
            "id": "Q590227",
            "data": {
                "fn": "Edward Albert Christian George Andrew Patrick David",
                "ln": "Windsor",
                "desc": "King of the United Kingdom and the British Dominions, Emperor of India (1936)",
                "label": "Edward VIII",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0a/Duke_and_Duchess_of_Windsor_-_Google_Art_Project_%28Duke_cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q117174",
            "data": {
                "fn": "Henry William Frederick Albert",
                "ln": "Windsor",
                "desc": "Governor-General of Australia from 1945 to 1947",
                "label": "Prince Henry, Duke of Gloucester",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/57/Dukeofgloucester.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q269412", "mother": "Q76927", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q80976",
            "data": {
                "fn": "Philip",
                "ln": "Mountbatten",
                "desc": "consort of Elizabeth II from 1952 to 2021",
                "label": "Prince Philip, Duke of Edinburgh",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e2/Duke_of_Edinburgh_33_Allan_Warren.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q156531",
                "mother": "Q116062",
                "spouses": ["Q9682"],
                "children": ["Q43274", "Q151754", "Q153330", "Q154920"]
            },
            "main": false
        }, {
            "id": "Q43274",
            "data": {
                "fn": "Charles Philip Arthur George",
                "ln": "Mountbatten-Windsor",
                "desc": "King of the United Kingdom and other Commonwealth realms since 2022",
                "label": "Charles III",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ac/King_Charles_III_%28July_2023%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q80976",
                "mother": "Q9682",
                "spouses": ["Q9685", "Q152239"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q43274",
            "data": {
                "fn": "Charles Philip Arthur George",
                "ln": "Mountbatten-Windsor",
                "desc": "King of the United Kingdom and other Commonwealth realms since 2022",
                "label": "Charles III",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ac/King_Charles_III_%28July_2023%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q80976",
                "mother": "Q9682",
                "spouses": ["Q9685", "Q152239"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q43274",
            "data": {
                "fn": "Charles Philip Arthur George",
                "ln": "Mountbatten-Windsor",
                "desc": "King of the United Kingdom and other Commonwealth realms since 2022",
                "label": "Charles III",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ac/King_Charles_III_%28July_2023%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q80976",
                "mother": "Q9682",
                "spouses": ["Q9685", "Q152239"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q156531",
            "data": {
                "fn": "Andreas",
                "ln": "",
                "desc": "Greek prince; father of Prince Philip, Duke of Edinburgh (1882-1944)",
                "label": "Prince Andrew of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0c/Prince_Andrew_of_Greece.png",
                "gender": "M"
            },
            "rels": {
                "father": "Q17142",
                "mother": "Q155178",
                "spouses": ["Q116062"],
                "children": ["Q240317", "Q255382", "Q236196", "Q630371", "Q80976"]
            },
            "main": false
        }, {
            "id": "Q240317",
            "data": {
                "fn": "Margarita",
                "ln": "",
                "desc": "Greco-Danish Royal and German Noble",
                "label": "Princess Margarita of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/19/Pincess_Margarita_of_Greece.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q156531",
                "mother": "Q116062",
                "spouses": ["Q66546"],
                "children": ["Q72937", "Q75383284", "Q75384170", "Q75384169", "Q75384180", "Q75384181"]
            },
            "main": false
        }, {
            "id": "Q236196",
            "data": {
                "fn": "Cecilie",
                "ln": "",
                "desc": "Greek and Danish princess",
                "label": "Princess Cecilie of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/56/Princess_Cecilie_of_Greece.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q156531",
                "mother": "Q116062",
                "spouses": ["Q60737"],
                "children": ["Q2354262", "Q2874895", "Q2134004", "Q75383965"]
            },
            "main": false
        }, {
            "id": "Q630371",
            "data": {
                "fn": "Sophia",
                "ln": "",
                "desc": "Greek princess (1914-2001); elder sister of Prince Philip, Duke of Edinburgh",
                "label": "Princess Sophie of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/80/Princess_Sophie_of_Greece_and_Denmark.jpeg",
                "gender": "F"
            },
            "rels": {
                "father": "Q156531",
                "mother": "Q116062",
                "spouses": ["Q2314771", "Q61777"],
                "children": ["Q6530079", "Q6530102", "Q6530115", "Q6530298", "Q75383740", "Q2464604", "Q1621619", "Q75383767"]
            },
            "main": false
        }, {
            "id": "Q155178",
            "data": {
                "fn": "Olga",
                "ln": "Romanov",
                "desc": "Queen of the Hellenes (1851–1926)",
                "label": "Olga Constantinovna of Russia",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/af/Queen_Olga_of_Greece.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q446724",
                "mother": "Q57950",
                "spouses": ["Q17142"],
                "children": ["Q152099", "Q170396", "Q232728", "Q170160", "Q232732", "Q156531", "Q447757", "Q75381564"]
            },
            "main": false
        }, {
            "id": "Q17142",
            "data": {
                "fn": "Christian Vilhelm Ferdinand Adolf Georgios",
                "ln": "",
                "desc": "King of Greece (r. 1863–1913)",
                "label": "George I of Greece",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/33/George_I_of_Hellenes_1870.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q151305",
                "mother": "Q166028",
                "spouses": ["Q155178"],
                "children": ["Q152099", "Q170396", "Q232728", "Q170160", "Q232732", "Q156531", "Q447757", "Q75381564"]
            },
            "main": false
        }, {
            "id": "Q255382",
            "data": {
                "fn": "Theodora",
                "ln": "Baden",
                "desc": "Greco-Danish princess; sister of Prince Philip, Duke of Edinburgh (1906-1969)",
                "label": "Princess Theodora, Margravine of Baden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/1b/Study_portrait_of_Princess_Theodora_of_Greece_and_Denmark%2C_later_Margravine_of_Baden.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q156531",
                "mother": "Q116062",
                "spouses": ["Q62602"],
                "children": ["Q3424937", "Q1913939", "Q15878901"]
            },
            "main": false
        }, {
            "id": "Q75383284",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "(1933-1933)",
                "label": "stillborn daughter zu Hohenlohe-Langenburg",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q66546", "mother": "Q240317", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75384170",
            "data": {
                "fn": "Georg",
                "ln": "",
                "desc": "German aristocrat (1938-2021)",
                "label": "Prince Andreas of Hohenlohe-Langenburg",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q66546", "mother": "Q240317", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75384180",
            "data": {
                "fn": "Ruprecht",
                "ln": "",
                "desc": "(1944-1978)",
                "label": "Prince Ruprecht of Hohenlohe-Langenburg",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q66546", "mother": "Q240317", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75384169",
            "data": {
                "fn": "Beatrix",
                "ln": "",
                "desc": "German aristocrat (1936-1997)",
                "label": "Princess Beatrix of Hohenlohe-Langenburg",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q66546", "mother": "Q240317", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75384181",
            "data": {
                "fn": "Albrecht",
                "ln": "",
                "desc": "(1944-1992)",
                "label": "Prince Albrecht zu Hohenlohe-Langenburg",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q66546", "mother": "Q240317", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75383965",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "third son of Georg Donatus, Hereditary Grand Duke of Hesse and Princess Cecilie of Greece and Denmark",
                "label": "unnamed son von Hessen-Darmstadt",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q60737", "mother": "Q236196", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q72937",
            "data": {
                "fn": "Kraft Alexander Ernst Ludwig Georg Emich",
                "ln": "",
                "desc": "German prince (1935-2004)",
                "label": "Kraft, Prince of Hohenlohe-Langenburg",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q66546", "mother": "Q240317", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2354262",
            "data": {
                "fn": "no label",
                "ln": "Hessen Rhein",
                "desc": "only daughter of Georg Donatus, Hereditary Grand Duke of Hesse and Princess Cecilie of Greece and Denmark",
                "label": "Princess Johanna of Hesse and by Rhine",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q60737", "mother": "Q236196", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75383740",
            "data": {
                "fn": "Dorothea",
                "ln": "",
                "desc": "(born 1934)",
                "label": "Princess Dorothea of Hesse",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q2314771", "mother": "Q630371", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75383767",
            "data": {
                "fn": "Clarissa",
                "ln": "",
                "desc": "born 1944; youngest child of Prince Christoph of Hesse and Princess Sophie of Greece and Denmark",
                "label": "Princess Clarissa of Hesse",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q2314771", "mother": "Q630371", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1621619",
            "data": {
                "fn": "Rainer",
                "ln": "",
                "desc": "(born 1939)",
                "label": "Prince Rainer of Hesse",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q2314771", "mother": "Q630371", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6530102",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "Duke of Brunswick-Lüneburg",
                "label": "Prince Georg of Hanover",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q61777", "mother": "Q630371", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6530298",
            "data": {
                "fn": "Christina Margarethe",
                "ln": "",
                "desc": "eldest daughter of Prince Christoph of Hesse and Princess Sophie of Greece and Denmark",
                "label": "Princess Christina Margarethe of Hesse",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q2314771", "mother": "Q630371", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6530115",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "Hanoverian princess",
                "label": "Princess Friederike of Hanover",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q61777", "mother": "Q630371", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q61777",
            "data": {
                "fn": "Georg Wilhelm Ernst August Friedrich Axel",
                "ln": "",
                "desc": "German nobleman (1915–2006)",
                "label": "Prince Georg Wilhelm of Hanover",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q630371"], "children": ["Q6530079", "Q6530102", "Q6530115"]},
            "main": false
        }, {
            "id": "Q6530079",
            "data": {
                "fn": "Welf Ernst August Andreas Philipp Georg Wilhelm Ludwig Berthold",
                "ln": "",
                "desc": "Hanovarian prince",
                "label": "Prince Welf Ernst of Hanover",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q61777", "mother": "Q630371", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75381564",
            "data": {
                "fn": "Olga",
                "ln": "",
                "desc": "(1880-1880)",
                "label": "Princess Olga of Greece and Denmark",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75381564",
            "data": {
                "fn": "Olga",
                "ln": "",
                "desc": "(1880-1880)",
                "label": "Princess Olga of Greece and Denmark",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q15878901",
            "data": {
                "fn": "Ludwig Wilhelm",
                "ln": "Baden",
                "desc": "(born 1937)",
                "label": "Prince Ludwig of Baden",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q62602", "mother": "Q255382", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2874895",
            "data": {
                "fn": "Alexander",
                "ln": "Hessen Darmstadt",
                "desc": "second son of Georg Donatus, Hereditary Grand Duke of Hesse and Princess Cecilie of Greece and Denmark",
                "label": "Prince Alexander of Hesse and by Rhine",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/53/Alexander_de_hesse_1933.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q60737", "mother": "Q236196", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2134004",
            "data": {
                "fn": "Louis",
                "ln": "Hessen Darmstadt",
                "desc": "eldest son of Georg Donatus, Hereditary Grand Duke of Hesse and Princess Cecilie of Greece and Denmark (1931–1937)",
                "label": "Prince Ludwig of Hesse and by Rhine",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/65/Ludwig_1931.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q60737", "mother": "Q236196", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q60737",
            "data": {
                "fn": "Georg Donatus",
                "ln": "Hessen Darmstadt",
                "desc": "German noble (1906–1937)",
                "label": "Georg Donatus, Hereditary Grand Duke of Hesse",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/1c/Georg_Donatus_in_NS-Uniform.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q236196"], "children": ["Q2134004", "Q2874895", "Q2354262", "Q75383965"]},
            "main": false
        }, {
            "id": "Q66546",
            "data": {
                "fn": "Gottfried Hermann Alfred Paul Maximilian Viktor",
                "ln": "zu Hohenlohe-Langenburg",
                "desc": "prince of Hohenlohe-Langenburg (1897-1960)",
                "label": "Gottfried, 8th Prince of Hohenlohe-Langenburg",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6d/Erbprinz_Gottfried_z._Hohenlohe-Langenburg.jpg",
                "gender": "M"
            },
            "rels": {
                "spouses": ["Q240317"],
                "children": ["Q72937", "Q75383284", "Q75384169", "Q75384170", "Q75384180", "Q75384181"]
            },
            "main": false
        }, {
            "id": "Q2464604",
            "data": {
                "fn": "Karl",
                "ln": "",
                "desc": "German aristocrat (1937–2022)",
                "label": "Prince Karl of Hesse",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b6/Karl_Adolf_Andreas_Prinz_von_Hessen.png",
                "gender": "M"
            },
            "rels": {"father": "Q2314771", "mother": "Q630371", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2314771",
            "data": {
                "fn": "Christophe Christoph",
                "ln": "von Hessen",
                "desc": "German air force officer (1901-1943)",
                "label": "Prince Christoph of Hesse-Kassel",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/59/Crist%C3%B3bal_de_Hesse%2C_1901.jpg",
                "gender": "M"
            },
            "rels": {
                "spouses": ["Q630371"],
                "children": ["Q6530298", "Q1621619", "Q2464604", "Q75383740", "Q75383767"]
            },
            "main": false
        }, {
            "id": "Q232732",
            "data": {
                "fn": "Mariya",
                "ln": "",
                "desc": "Greek Royal",
                "label": "Princess Maria of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/ba/Princess_Maria_of_Greece_and_Denmark_%28Grand_Duchess_Maria_Georgievna_of_Russia%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q170160",
            "data": {
                "fn": "Nikolaos",
                "ln": "Greece Denmark",
                "desc": "Prince of Greece and Denmark (1872-1938)",
                "label": "Prince Nicholas of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6d/Prince_Nicholas_of_Greece_and_Denmark.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q170396",
            "data": {
                "fn": "Georgios",
                "ln": "",
                "desc": "Prince of Greece and Denmark (1869-1957)",
                "label": "Prince George of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/03/PrigkphpasGewrgios.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q447757",
            "data": {
                "fn": "Christopher",
                "ln": "",
                "desc": "Greek prince; youngest child of George I of Greece and Olga Constantinovna of Russia (1888–1940)",
                "label": "Prince Christopher of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/03/Prince_Christopher_of_Greece.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q232728",
            "data": {
                "fn": "Alexandra",
                "ln": "",
                "desc": "daughter of George I of Greece and Olga Constantinovna of Russia; wife of Grand Duke Paul Alexandrovich of Russia",
                "label": "Grand Duchess Alexandra Georgievna, Grand Duchess Pavlovna of Russia",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Alexandra_Georgievna_of_Russia_%281870-1891%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q17142",
            "data": {
                "fn": "Christian Vilhelm Ferdinand Adolf Georgios",
                "ln": "",
                "desc": "King of Greece (r. 1863–1913)",
                "label": "George I of Greece",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/33/George_I_of_Hellenes_1870.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q151305",
                "mother": "Q166028",
                "spouses": ["Q155178"],
                "children": ["Q152099", "Q170396", "Q232728", "Q170160", "Q232732", "Q156531", "Q447757", "Q75381564"]
            },
            "main": false
        }, {
            "id": "Q170160",
            "data": {
                "fn": "Nikolaos",
                "ln": "Greece Denmark",
                "desc": "Prince of Greece and Denmark (1872-1938)",
                "label": "Prince Nicholas of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6d/Prince_Nicholas_of_Greece_and_Denmark.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q152099",
            "data": {
                "fn": "Konstantinos",
                "ln": "",
                "desc": "King of Greece (r. 1913–17; 1920–22)",
                "label": "Constantine I of Greece",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/a7/BASA-237K-1-361-4-Constantine_I_of_Greece.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q62602",
            "data": {
                "fn": "Berthold",
                "ln": "Baden",
                "desc": "German prince (1906-1963)",
                "label": "Prince Berthold, Margrave of Baden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2a/Prince_Berthold_of_Baden.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q255382"], "children": ["Q3424937", "Q1913939", "Q15878901"]},
            "main": false
        }, {
            "id": "Q1913939",
            "data": {
                "fn": "Max",
                "ln": "Baden",
                "desc": "German aristocrat (1933-2022)",
                "label": "Prince Maximilian, Margrave of Baden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0a/Maximilian_Andreas_Markgraf_von_Baden_%282017%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q62602", "mother": "Q255382", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q57950",
            "data": {
                "fn": "Alexandra Friederike Henriette Pauline Marianne Elisabeth",
                "ln": "",
                "desc": "wife of Grand Duke Constantine Nikolaevich of Russia (1830-1911)",
                "label": "Princess Alexandra of Saxe-Altenburg",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ec/Grand_Duchess_Alexandra_Iosifovna.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q446724"], "children": ["Q155178"]},
            "main": false
        }, {
            "id": "Q151305",
            "data": {
                "fn": "Christian",
                "ln": "",
                "desc": "King of Denmark from 1863 to 1906",
                "label": "Christian IX of Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/33/Christian_IX_af_Henrik_Olrik.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q166028"], "children": ["Q152260", "Q17142"]},
            "main": false
        }, {
            "id": "Q232732",
            "data": {
                "fn": "Mariya",
                "ln": "",
                "desc": "Greek Royal",
                "label": "Princess Maria of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/ba/Princess_Maria_of_Greece_and_Denmark_%28Grand_Duchess_Maria_Georgievna_of_Russia%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q447757",
            "data": {
                "fn": "Christopher",
                "ln": "",
                "desc": "Greek prince; youngest child of George I of Greece and Olga Constantinovna of Russia (1888–1940)",
                "label": "Prince Christopher of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/03/Prince_Christopher_of_Greece.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q170396",
            "data": {
                "fn": "Georgios",
                "ln": "",
                "desc": "Prince of Greece and Denmark (1869-1957)",
                "label": "Prince George of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/03/PrigkphpasGewrgios.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q166028",
            "data": {
                "fn": "Louise Wilhelmine Friederike Caroline Julie Auguste",
                "ln": "Hessen Kassel",
                "desc": "Queen Consort of Denmark (1863-1898)",
                "label": "Louise of Hesse-Kassel",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9c/Queen_Lujza_of_Denmark.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q151305"], "children": ["Q152260", "Q17142"]},
            "main": false
        }, {
            "id": "Q152099",
            "data": {
                "fn": "Konstantinos",
                "ln": "",
                "desc": "King of Greece (r. 1913–17; 1920–22)",
                "label": "Constantine I of Greece",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/a7/BASA-237K-1-361-4-Constantine_I_of_Greece.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q232728",
            "data": {
                "fn": "Alexandra",
                "ln": "",
                "desc": "daughter of George I of Greece and Olga Constantinovna of Russia; wife of Grand Duke Paul Alexandrovich of Russia",
                "label": "Grand Duchess Alexandra Georgievna, Grand Duchess Pavlovna of Russia",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/72/Alexandra_Georgievna_of_Russia_%281870-1891%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q17142", "mother": "Q155178", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q446724",
            "data": {
                "fn": "Konstantin",
                "ln": "Romanov",
                "desc": "Russian grand duke (1827-1892)",
                "label": "Grand Duke Konstantin Nikolayevich of Russia",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2e/Romanov%2C_Constantin_Nicolaievitch%2C_Grand-Duc_de_Russie%2C_Gallica%2C_Nadar.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q57950"], "children": ["Q155178"]},
            "main": false
        }, {
            "id": "Q3424937",
            "data": {
                "fn": "Margarita Viktoria Marie Louise Scholastica Thyra Alice",
                "ln": "Baden",
                "desc": "daughter of Berthold, Margrave of Baden, and Princess Theodora of Greece and Denmark (1932–2013)",
                "label": "Princess Margarita of Baden",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b0/Princess_Margarita_of_Baden.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q62602", "mother": "Q255382", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q43274",
            "data": {
                "fn": "Charles Philip Arthur George",
                "ln": "Mountbatten-Windsor",
                "desc": "King of the United Kingdom and other Commonwealth realms since 2022",
                "label": "Charles III",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ac/King_Charles_III_%28July_2023%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q80976",
                "mother": "Q9682",
                "spouses": ["Q9685", "Q152239"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q156531",
            "data": {
                "fn": "Andreas",
                "ln": "",
                "desc": "Greek prince; father of Prince Philip, Duke of Edinburgh (1882-1944)",
                "label": "Prince Andrew of Greece and Denmark",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0c/Prince_Andrew_of_Greece.png",
                "gender": "M"
            },
            "rels": {
                "father": "Q17142",
                "mother": "Q155178",
                "spouses": ["Q116062"],
                "children": ["Q240317", "Q255382", "Q236196", "Q630371", "Q80976"]
            },
            "main": false
        }, {
            "id": "Q43274",
            "data": {
                "fn": "Charles Philip Arthur George",
                "ln": "Mountbatten-Windsor",
                "desc": "King of the United Kingdom and other Commonwealth realms since 2022",
                "label": "Charles III",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ac/King_Charles_III_%28July_2023%29.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q80976",
                "mother": "Q9682",
                "spouses": ["Q9685", "Q152239"],
                "children": ["Q36812", "Q152316"]
            },
            "main": false
        }, {
            "id": "Q269309",
            "data": {
                "fn": "Talulah",
                "ln": "Riley",
                "desc": "British actress",
                "label": "Talulah Riley",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/07/TalulahRileyAug09_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q317521"], "children": []},
            "main": false
        }, {
            "id": "Q6318376",
            "data": {
                "fn": "Justine",
                "ln": "Wilson",
                "desc": "Canadian writer (born 1972)",
                "label": "Justine Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q317521"],
                "children": ["Q95724881", "Q97572429", "Q101675036", "Q101675234", "Q101674980", "Q109731214"]
            },
            "main": false
        }, {
            "id": "Q6318376",
            "data": {
                "fn": "Justine",
                "ln": "Wilson",
                "desc": "Canadian writer (born 1972)",
                "label": "Justine Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q317521"],
                "children": ["Q95724881", "Q97572429", "Q101675036", "Q101675234", "Q101674980", "Q109731214"]
            },
            "main": false
        }, {
            "id": "Q6318376",
            "data": {
                "fn": "Justine",
                "ln": "Wilson",
                "desc": "Canadian writer (born 1972)",
                "label": "Justine Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q317521"],
                "children": ["Q95724881", "Q97572429", "Q101675036", "Q101675234", "Q101674980", "Q109731214"]
            },
            "main": false
        }, {
            "id": "Q6318376",
            "data": {
                "fn": "Justine",
                "ln": "Wilson",
                "desc": "Canadian writer (born 1972)",
                "label": "Justine Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q317521"],
                "children": ["Q95724881", "Q97572429", "Q101675036", "Q101675234", "Q101674980", "Q109731214"]
            },
            "main": false
        }, {
            "id": "Q6318376",
            "data": {
                "fn": "Justine",
                "ln": "Wilson",
                "desc": "Canadian writer (born 1972)",
                "label": "Justine Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q317521"],
                "children": ["Q95724881", "Q97572429", "Q101675036", "Q101675234", "Q101674980", "Q109731214"]
            },
            "main": false
        }, {
            "id": "Q111363577",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "half-sister of Elon Musk",
                "label": "Asha Rose Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q35723119", "mother": "Q104721250", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q101676922",
            "data": {
                "fn": "Cora",
                "ln": "",
                "desc": "wife of Walter Musk",
                "label": "Cora Amelia Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q101676766"], "children": ["Q35723119"]},
            "main": false
        }, {
            "id": "Q101676766",
            "data": {
                "fn": "Walter",
                "ln": "",
                "desc": "military personnel",
                "label": "Walter Henry James Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q101676922"], "children": ["Q35723119"]},
            "main": false
        }, {
            "id": "Q104721250",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "step-mother of Elon Musk",
                "label": "Heide Bezuidenhout",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q35723119"], "children": ["Q111363577", "Q105538968"]},
            "main": false
        }, {
            "id": "Q112957545",
            "data": {
                "fn": "Shivon",
                "ln": "no label",
                "desc": "Canadian technology executive and project director at Neuralink",
                "label": "Shivon Zilis",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q317521"], "children": ["Q122374820", "Q122374852"]},
            "main": false
        }, {
            "id": "Q112957545",
            "data": {
                "fn": "Shivon",
                "ln": "no label",
                "desc": "Canadian technology executive and project director at Neuralink",
                "label": "Shivon Zilis",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": [], "children": ["Q122374820", "Q122374852"]},
            "main": false
        }, {
            "id": "Q104721244",
            "data": {
                "fn": "Elliot Rush",
                "ln": "Musck",
                "desc": "half-brother and step-nephew of Elon Musk",
                "label": "Elliot Rush Musk",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q35723119",
                "spouses": [],
                "children": [],
                "mother": "fb0668dd-f150-4994-8ecf-8191ac40c03f"
            },
            "main": false
        }, {
            "id": "Q105538968",
            "data": {
                "fn": "Alexandra",
                "ln": "Musck",
                "desc": "half-sister of Elon Musk",
                "label": "Alexandra Musk",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q35723119", "mother": "Q104721250", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q101674980",
            "data": {
                "fn": "Vivian Jenna",
                "ln": "Wilson",
                "desc": "American student and daughter of Elon Musk (born 2004)",
                "label": "Vivian Jenna Wilson",
                "avatar": null
            },
            "rels": {"father": "Q317521", "mother": "Q6318376", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q7827568",
            "data": {
                "fn": "Tosca",
                "ln": "Musck",
                "desc": "South African filmmaker (born 1974)",
                "label": "Tosca Musk",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/28/SXSW_Facebook_Party_-_Tosca_Musk.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q35723119", "mother": "Q24007468", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q101676386",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "(1914-2012)",
                "label": "Winnifred Josephine Haldeman",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q101676127"], "children": ["Q24007468"]},
            "main": false
        }, {
            "id": "Q101676127",
            "data": {
                "fn": "Joshua",
                "ln": "",
                "desc": "Politician and chiropractor",
                "label": "Joshua Norman Haldeman",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q101676386"], "children": ["Q24007468"]},
            "main": false
        }, {
            "id": "Q24007468",
            "data": {
                "fn": "Maye",
                "ln": "Musck",
                "desc": "Canadian-South African model and dietitian",
                "label": "Maye Musk",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/42/Maye-Musk.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q101676127",
                "mother": "Q101676386",
                "spouses": ["Q35723119"],
                "children": ["Q317521", "Q7827568", "Q6409751"]
            },
            "main": false
        }, {
            "id": "Q6409751",
            "data": {
                "fn": "Kimbal",
                "ln": "Musck",
                "desc": "South African entrepreneur (born 1972)",
                "label": "Kimbal Musk",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/54/Kimbal_Musk_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q35723119", "mother": "Q24007468", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q117970",
            "data": {
                "fn": "Claire Elise",
                "ln": "Boucher",
                "desc": "Canadian musician (born 1988)",
                "label": "Grimes",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4d/Grimes_crop_2012.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q317521"], "children": ["Q93418989", "Q111204042", "Q122374054"]},
            "main": false
        }, {
            "id": "Q117970",
            "data": {
                "fn": "Claire Elise",
                "ln": "Boucher",
                "desc": "Canadian musician (born 1988)",
                "label": "Grimes",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4d/Grimes_crop_2012.jpg",
                "gender": "F"
            },
            "rels": {"spouses": [], "children": ["Q93418989", "Q111204042", "Q122374054"]},
            "main": false
        }, {
            "id": "Q117970",
            "data": {
                "fn": "Claire Elise",
                "ln": "Boucher",
                "desc": "Canadian musician (born 1988)",
                "label": "Grimes",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4d/Grimes_crop_2012.jpg",
                "gender": "F"
            },
            "rels": {"spouses": [], "children": ["Q93418989", "Q111204042", "Q122374054"]},
            "main": false
        }, {
            "id": "Q7827568",
            "data": {
                "fn": "Tosca",
                "ln": "Musck",
                "desc": "South African filmmaker (born 1974)",
                "label": "Tosca Musk",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/28/SXSW_Facebook_Party_-_Tosca_Musk.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q35723119", "mother": "Q24007468", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6409751",
            "data": {
                "fn": "Kimbal",
                "ln": "Musck",
                "desc": "South African entrepreneur (born 1972)",
                "label": "Kimbal Musk",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/54/Kimbal_Musk_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q35723119", "mother": "Q24007468", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q92466304",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "sister of Bill Gates",
                "label": "Libby Gates MacPhee",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q684014", "mother": "Q454928", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q96201224",
            "data": {
                "fn": "Adele",
                "ln": "Thompson",
                "desc": "(1903-1987)",
                "label": "Adele Thompson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q96201199"], "children": ["Q454928"]},
            "main": false
        }, {
            "id": "Q92466067",
            "data": {
                "fn": "Kristianne",
                "ln": "Gates",
                "desc": "sister of Bill Gates",
                "label": "Kristianne Gates",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q684014", "mother": "Q454928", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q96201199",
            "data": {
                "fn": "James",
                "ln": "",
                "desc": "(1901-1960)",
                "label": "James Willard Maxwell",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q96201224"], "children": ["Q454928"]},
            "main": false
        }, {
            "id": "Q92466304",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "sister of Bill Gates",
                "label": "Libby Gates MacPhee",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q684014", "mother": "Q454928", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q92466067",
            "data": {
                "fn": "Kristianne",
                "ln": "Gates",
                "desc": "sister of Bill Gates",
                "label": "Kristianne Gates",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q684014", "mother": "Q454928", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q96201178",
            "data": {
                "fn": "William Henry",
                "ln": "Gates",
                "desc": "paternal grandfather of Bill Gates (1891-1969)",
                "label": "William Henry Gates",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q96201192"], "children": ["Q684014"]},
            "main": false
        }, {
            "id": "Q6862133",
            "data": {
                "fn": "Mimi",
                "ln": "Gardner Gates",
                "desc": "American curator",
                "label": "Mimi Gardner Gates",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q684014"], "children": []},
            "main": false
        }, {
            "id": "Q96201192",
            "data": {
                "fn": "Lillian Elizabeth",
                "ln": "Rice",
                "desc": "1891 Washington - 27 Nov 1966 Bremerton, Washington",
                "label": "Lillian Elizabeth Rice",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q96201178"], "children": ["Q684014"]},
            "main": false
        }, {
            "id": "Q106695809",
            "data": {
                "fn": "Elaine",
                "ln": "",
                "desc": "(1940-1994)",
                "label": "Elaine Agnes Amerland",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["8c0b3f32-bf5f-4589-990a-248f459291c3"], "children": ["Q463877"]},
            "main": false
        }, {
            "id": "Q684014",
            "data": {
                "fn": "William Henry",
                "ln": "Gates",
                "desc": "American attorney and philanthropist (1925–2020)",
                "label": "Bill Gates Sr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b7/William-H-Gates-Senior-New-Delhi-Hi-Res.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q96201178",
                "mother": "Q96201192",
                "spouses": ["Q454928", "Q6862133"],
                "children": ["Q5284", "Q92466067", "Q92466304"]
            },
            "main": false
        }, {
            "id": "Q463877",
            "data": {
                "fn": "Melinda Ann",
                "ln": "Gates French",
                "desc": "American philanthropist",
                "label": "Melinda Gates",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ec/Melinda_Gates_-_World_Economic_Forum_Annual_Meeting_2011.jpg",
                "gender": "F"
            },
            "rels": {"mother": "Q106695809", "spouses": ["Q5284"], "children": ["Q23011254", "Q23011256", "Q23011257"]},
            "main": false
        }, {
            "id": "Q463877",
            "data": {
                "fn": "Melinda Ann",
                "ln": "Gates French",
                "desc": "American philanthropist",
                "label": "Melinda Gates",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ec/Melinda_Gates_-_World_Economic_Forum_Annual_Meeting_2011.jpg",
                "gender": "F"
            },
            "rels": {"mother": "Q106695809", "spouses": ["Q5284"], "children": ["Q23011254", "Q23011256", "Q23011257"]},
            "main": false
        }, {
            "id": "Q84766147",
            "data": {
                "fn": "Nayel",
                "ln": "Nassar",
                "desc": "Egyptian-American professional equestrian and show jumper",
                "label": "Nayel Nassar",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/28/Nayel_Nassar_Lordan_-_GCL_Championat_von_Hamburg_2018.JPG",
                "gender": "M"
            },
            "rels": {"spouses": ["Q23011254"], "children": []},
            "main": false
        }, {
            "id": "Q463877",
            "data": {
                "fn": "Melinda Ann",
                "ln": "Gates French",
                "desc": "American philanthropist",
                "label": "Melinda Gates",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ec/Melinda_Gates_-_World_Economic_Forum_Annual_Meeting_2011.jpg",
                "gender": "F"
            },
            "rels": {"mother": "Q106695809", "spouses": ["Q5284"], "children": ["Q23011254", "Q23011256", "Q23011257"]},
            "main": false
        }, {
            "id": "Q22084764",
            "data": {
                "fn": "Ida",
                "ln": "juanbellako6",
                "desc": "Sister of Adolf Hitler (1886-1888)",
                "label": "Ida Hitler",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q22084775",
            "data": {
                "fn": "Otto",
                "ln": "juanbellako6",
                "desc": "brother of Adolf Hitler",
                "label": "Otto Hitler",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q22084744",
            "data": {
                "fn": "Gustav",
                "ln": "juanbellako6",
                "desc": "Adolf Hitler's older brother who died in infancy due to diphtheria",
                "label": "Gustav Hitler",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q22132490",
            "data": {
                "fn": "Johann Baptist",
                "ln": "Pölzl",
                "desc": "no description",
                "label": "Johann Baptist Pölzl",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q6216378"], "children": ["Q158314"]},
            "main": false
        }, {
            "id": "Q22084776",
            "data": {
                "fn": "Edmund",
                "ln": "juanbellako6",
                "desc": "brother of Adolf Hitler",
                "label": "Edmund Hitler",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6216378",
            "data": {
                "fn": "Johanna",
                "ln": "Hiedler Pölzl",
                "desc": "Grandmother of Adolf Hitler",
                "label": "Johanna Hiedler",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q3319490",
                "spouses": ["Q22132490"],
                "children": ["Q158314"],
                "mother": "ebf69e1d-3b58-495a-a33c-f153e436a005"
            },
            "main": false
        }, {
            "id": "Q22677145",
            "data": {
                "fn": "Friedrich",
                "ln": "Braun",
                "desc": "Eva Braun's father in law (1879-1964)",
                "label": "Friedrich Braun",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q4613831"], "children": ["Q76433"]},
            "main": false
        }, {
            "id": "Q13637691",
            "data": {
                "fn": "Franziska",
                "ln": "Matzelsberger",
                "desc": "second wife of Adolf Hitler's father (1861-1884)",
                "label": "Franziska Matzelsberger",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q78500"], "children": ["Q66225", "Q78643"]},
            "main": false
        }, {
            "id": "Q22084744",
            "data": {
                "fn": "Gustav",
                "ln": "juanbellako6",
                "desc": "Adolf Hitler's older brother who died in infancy due to diphtheria",
                "label": "Gustav Hitler",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q22668115",
            "data": {
                "fn": "Anna Maria",
                "ln": "Glassl-Hoerer",
                "desc": "first wife of Alois Schicklgruber (Hitler)",
                "label": "Anna Glasl-Hörer",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q78500"], "children": []},
            "main": false
        }, {
            "id": "Q66225",
            "data": {
                "fn": "Alois Hans",
                "ln": "juanbellako6 Hiller Matzelsberger",
                "desc": "half-brother of Adolf Hitler",
                "label": "Alois Hitler, Jr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q78500", "mother": "Q13637691", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q22084776",
            "data": {
                "fn": "Edmund",
                "ln": "juanbellako6",
                "desc": "brother of Adolf Hitler",
                "label": "Edmund Hitler",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q84328",
            "data": {
                "fn": "Paula",
                "ln": "juanbellako6 Wolff juanbellako6",
                "desc": "younger sister of Adolf Hitler (1896–1960)",
                "label": "Paula Hitler",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c4/Paula_Wolf_Scan.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q22084775",
            "data": {
                "fn": "Otto",
                "ln": "juanbellako6",
                "desc": "brother of Adolf Hitler",
                "label": "Otto Hitler",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2779550",
            "data": {
                "fn": "Maria Anna",
                "ln": "Schicklgruber",
                "desc": "Adolf Hitler's paternal grandmother (1795-1847)",
                "label": "Maria Schicklgruber",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q3319490"], "children": ["Q78500"]},
            "main": false
        }, {
            "id": "Q22084764",
            "data": {
                "fn": "Ida",
                "ln": "juanbellako6",
                "desc": "Sister of Adolf Hitler (1886-1888)",
                "label": "Ida Hitler",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q4613831",
            "data": {
                "fn": "Franziska Katharina",
                "ln": "Braun Kronberger",
                "desc": "German tailor (1885-1976)",
                "label": "Franziska Braun",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ab/Franziska_Braun.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q22677145"], "children": ["Q76433"]},
            "main": false
        }, {
            "id": "Q84328",
            "data": {
                "fn": "Paula",
                "ln": "juanbellako6 Wolff juanbellako6",
                "desc": "younger sister of Adolf Hitler (1896–1960)",
                "label": "Paula Hitler",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c4/Paula_Wolf_Scan.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q78500", "mother": "Q158314", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3319490",
            "data": {
                "fn": "Johann Nepomuk",
                "ln": "Hiedler Hüttler",
                "desc": "Austrian farmer and ancestor of Adolf Hitler (1807 – 1888)",
                "label": "Johann Nepomuk Hiedler",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "spouses": ["Q2779550", "ebf69e1d-3b58-495a-a33c-f153e436a005"],
                "children": ["Q78500", "Q6216378"]
            },
            "main": false
        }, {
            "id": "Q78500",
            "data": {
                "fn": "Alois",
                "ln": "juanbellako6 Schicklgruber",
                "desc": "Austrian civil servant; father of Adolf Hitler (1837-1903)",
                "label": "Alois Hitler",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/41/Alois_Hitler.jpeg",
                "gender": "M"
            },
            "rels": {
                "father": "Q3319490",
                "mother": "Q2779550",
                "spouses": ["Q158314", "Q13637691", "Q22668115"],
                "children": ["Q352", "Q84328", "Q22084744", "Q22084764", "Q22084775", "Q22084776", "Q78643", "Q66225"]
            },
            "main": false
        }, {
            "id": "Q78643",
            "data": {
                "fn": "Angela Franziska Johanna",
                "ln": "juanbellako6 Raubal Hammitzsch",
                "desc": "elder half-sister of Adolf Hitler (1883-1949)",
                "label": "Angela Hitler",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2e/Angela_hitler.webp",
                "gender": "F"
            },
            "rels": {"father": "Q78500", "mother": "Q13637691", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q105756153",
            "data": {
                "fn": "Lidiya",
                "ln": "",
                "desc": "mother of two of Joseph Stalin's illegitimate children",
                "label": "Lidiya Pereprygina",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q855"], "children": ["Q108722703", "Q105756206"]},
            "main": false
        }, {
            "id": "Q105756153",
            "data": {
                "fn": "Lidiya",
                "ln": "",
                "desc": "mother of two of Joseph Stalin's illegitimate children",
                "label": "Lidiya Pereprygina",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": [], "children": ["Q108722703", "Q105756206"]},
            "main": false
        }, {
            "id": "Q56230675",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "no description",
                "label": "Vladimir Kuzakov",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q3302174",
                "spouses": [],
                "children": [],
                "mother": "3211ab53-2865-46f4-b419-3f8c7a2f5a6c"
            },
            "main": false
        }, {
            "id": "Q124719938",
            "data": {
                "fn": "Olga",
                "ln": "Alliluyeva",
                "desc": "Nadezhda Alliluyeva's mother",
                "label": "Olga Evgen'evna Fedorenko",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q4062652"], "children": ["Q233999"]},
            "main": false
        }, {
            "id": "Q108723194",
            "data": {
                "fn": "Mikhail Mikheil",
                "ln": "Jughashvili",
                "desc": "eldest brother of Joseph Stalin",
                "label": "Mikhail Jughashvili",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q717406", "mother": "Q241535", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q108724582",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "granddaughter of Joseph Stalin",
                "label": "Elena Yakovlevna Dzhugashvili",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q163816", "mother": "Q108724670", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q108723531",
            "data": {
                "fn": "Giorgi Georgiy",
                "ln": "Jughashvili",
                "desc": "older brother of Joseph Stalin",
                "label": "Giorgi Jughashvili",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q717406", "mother": "Q241535", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q107291873",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "paternal grandmother of Joseph Stalin",
                "label": "Besarion Jughashvili's mother",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q56218448"], "children": ["Q717406"]},
            "main": false
        }, {
            "id": "Q21636562",
            "data": {
                "fn": "Galina",
                "ln": "",
                "desc": "no description",
                "label": "Galina Burdonskaya",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q459216"], "children": ["Q4099484"]},
            "main": false
        }, {
            "id": "Q4099484",
            "data": {
                "fn": "Aleksandr",
                "ln": "",
                "desc": "Soviet theatre director",
                "label": "Aleksandr Burdonsky",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q459216", "mother": "Q21636562", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q108724670",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "daughter-in-law of Joseph Stalin",
                "label": "Zoya Gunina",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q163816"], "children": ["Q108724582"]},
            "main": false
        }, {
            "id": "Q28038546",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "first mother-in-law of Joseph Stalin",
                "label": "Sepora Dvali",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q28038544"], "children": ["Q254673"]},
            "main": false
        }, {
            "id": "Q56218448",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "paternal grandfather of Stalin",
                "label": "Vano Zazovich Dzhugashvili",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q107291873"], "children": ["Q717406"]},
            "main": false
        }, {
            "id": "Q4062652",
            "data": {
                "fn": "Sergey",
                "ln": "Alliluyev",
                "desc": "Russian revolutionary (1866-1945)",
                "label": "Sergey Alliluyev",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q124719938"], "children": ["Q233999"]},
            "main": false
        }, {
            "id": "Q28038544",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "no description",
                "label": "Svimon Svanidze",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q28038546"], "children": ["Q254673"]},
            "main": false
        }, {
            "id": "Q56231163",
            "data": {
                "fn": "Melania",
                "ln": "",
                "desc": "adoptive maternal grandmother of Stalin",
                "label": "Melania Homesurashvili",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q56219116"], "children": ["Q241535"]},
            "main": false
        }, {
            "id": "Q56219116",
            "data": {
                "fn": "",
                "ln": "Geladze",
                "desc": "maternal grandfather of Stalin",
                "label": "Glakha Geladze",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q56231163"], "children": ["Q241535"]},
            "main": false
        }, {
            "id": "Q56230882",
            "data": {
                "fn": "Julia",
                "ln": "",
                "desc": "ballerina, wife of Yakov Dzhugashvili",
                "label": "Yulia Meltzer",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q163816"], "children": ["Q1984422"]},
            "main": false
        }, {
            "id": "Q108723531",
            "data": {
                "fn": "Giorgi Georgiy",
                "ln": "Jughashvili",
                "desc": "older brother of Joseph Stalin",
                "label": "Giorgi Jughashvili",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q717406", "mother": "Q241535", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q4160519",
            "data": {
                "fn": "Evgeny",
                "ln": "Jughashvili",
                "desc": "Russian politician (1936–2016)",
                "label": "Yevgeny Dzhugashvili",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q163816",
                "spouses": [],
                "children": [],
                "mother": "9a9dbd34-14f4-4e15-8780-f0c268ae7e4b"
            },
            "main": false
        }, {
            "id": "Q1332918",
            "data": {
                "fn": "Fyodor",
                "ln": "Sergeyev",
                "desc": "Russian revolutionary, Soviet politician, agitator, and journalist (1883-1921)",
                "label": "Fyodor Sergeyev",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/b/b3/Fyodor_Sergeyev.JPG",
                "gender": "M"
            },
            "rels": {"spouses": ["f9ebe325-4ffd-4d26-87ca-d4232af18ffd"], "children": ["Q4416801"]},
            "main": false
        }, {
            "id": "Q1984422",
            "data": {
                "fn": "Galina",
                "ln": "",
                "desc": "Russian translator (1938-2007)",
                "label": "Galina Dzhugashvili",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q163816", "mother": "Q56230882", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q22344319",
            "data": {
                "fn": "Iosif",
                "ln": "",
                "desc": "possible half-brother of Joseph Stalin and author under the name M. Davrichewy",
                "label": "Joseph Davrichachvili",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "mother": "Q241535",
                "spouses": [],
                "children": [],
                "father": "6fd3c966-f6ac-4844-89bf-c88d6685f3a9"
            },
            "main": false
        }, {
            "id": "Q108723194",
            "data": {
                "fn": "Mikhail Mikheil",
                "ln": "Jughashvili",
                "desc": "eldest brother of Joseph Stalin",
                "label": "Mikhail Jughashvili",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q717406", "mother": "Q241535", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q228584",
            "data": {
                "fn": "Svetlana",
                "ln": "Alliluyeva Peters",
                "desc": "Joseph Stalin's daughter (1926–2011)",
                "label": "Svetlana Alliluyeva",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ea/Svetlana_Alliluyeva_1970.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q855",
                "mother": "Q233999",
                "spouses": ["Q4302955", "Q4178491", "Q6616173", "Q4409943"],
                "children": ["Q57469252", "Q98102305", "Q4062650"]
            },
            "main": false
        }, {
            "id": "Q459216",
            "data": {
                "fn": "Vasily",
                "ln": "Stalin Jughashvili",
                "desc": "Soviet general and son of Joseph Stalin (1921–1962)",
                "label": "Vasily Dzhugashvili",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/c9/Vasilij-stalin.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q855", "mother": "Q233999", "spouses": ["Q21636562"], "children": ["Q4099484"]},
            "main": false
        }, {
            "id": "Q57469252",
            "data": {
                "fn": "Olga Chris",
                "ln": "Evans Peters",
                "desc": "American antique dealer",
                "label": "Chrese Evans",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q6616173", "mother": "Q228584", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q98102305",
            "data": {
                "fn": "Ekaterina",
                "ln": "Zhdanov",
                "desc": "Soviet/Russian volcanologist,Stalin's granddaughter",
                "label": "Yekaterina Zhdanova",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q4178491", "mother": "Q228584", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q4062650",
            "data": {
                "fn": "Iosif",
                "ln": "Alliluyev",
                "desc": "Russian cardiologist; grandson of Joseph Stalin (1945-2008)",
                "label": "Joseph Alliluyev",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q4302955", "mother": "Q228584", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q241535",
            "data": {
                "fn": "Ekaterina Keke",
                "ln": "Geladze",
                "desc": "mother of Joseph Stalin",
                "label": "Keke Geladze",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/82/Ekaterina_Dzhugashvili.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q56219116",
                "mother": "Q56231163",
                "spouses": ["Q717406"],
                "children": ["Q108723194", "Q108723531", "Q855", "Q22344319"]
            },
            "main": false
        }, {
            "id": "Q4302955",
            "data": {
                "fn": "Grigori",
                "ln": "Morozov",
                "desc": "no description",
                "label": "Grigory Morozov",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q228584"], "children": ["Q4062650"]},
            "main": false
        }, {
            "id": "Q254673",
            "data": {
                "fn": "Ekaterina",
                "ln": "Svanidze",
                "desc": "first wife of Josef Stalin (1885-1907)",
                "label": "Ekaterina Svanidze",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4d/Kato_Svanidze_Portrait.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q28038544", "mother": "Q28038546", "spouses": ["Q855"], "children": ["Q163816"]},
            "main": false
        }, {
            "id": "Q4409943",
            "data": {
                "fn": "Ivan John Reed",
                "ln": "Svanidze",
                "desc": "Soviet academic, nephew and son-in-law of Joseph Stalin",
                "label": "Ivan Svanidze",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q228584"], "children": []},
            "main": false
        }, {
            "id": "Q4178491",
            "data": {
                "fn": "Yury",
                "ln": "Zhdanov",
                "desc": "Russian chemist (1919-2006)",
                "label": "Yuri Zhdanov",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/ad/%D0%96%D0%B4%D0%B0%D0%BD%D0%BE%D0%B2_%D0%AE%D1%80%D0%B8%D0%B9_%D0%90%D0%BD%D0%B4%D1%80%D0%B5%D0%B5%D0%B2%D0%B8%D1%87.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q228584"], "children": ["Q98102305"]},
            "main": false
        }, {
            "id": "Q6616173",
            "data": {
                "fn": "William",
                "ln": "Peters",
                "desc": "American architect",
                "label": "William Wesley Peters",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e0/William_Wesley_Peters.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q228584"], "children": ["Q57469252"]},
            "main": false
        }, {
            "id": "Q5346952",
            "data": {
                "fn": "Edwina",
                "ln": "Sandys",
                "desc": "British sculptor",
                "label": "Edwina Sandys",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q203129", "mother": "Q5271122", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75386025",
            "data": {
                "fn": "John",
                "ln": "",
                "desc": "(1900-1946)",
                "label": "Sir John Milner Bailey, 2nd Bt.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q5271122"], "children": []},
            "main": false
        }, {
            "id": "Q35160543",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "British colonial officer",
                "label": "Montagu Porch",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q243011"], "children": []},
            "main": false
        }, {
            "id": "Q61750828",
            "data": {
                "fn": "Clarissa",
                "ln": "Hall",
                "desc": "(1825-1895)",
                "label": "Clarissa Hall",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q1819011"], "children": ["Q243011"]},
            "main": false
        }, {
            "id": "Q75386034",
            "data": {
                "fn": "Julian",
                "ln": "",
                "desc": "(1936-1997)",
                "label": "Julian George Winston Sandys",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q203129", "mother": "Q5271122", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75386057",
            "data": {
                "fn": "Celia",
                "ln": "",
                "desc": "(born 1943)",
                "label": "Celia Mary Sandys",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "father": "Q203129",
                "mother": "Q5271122",
                "spouses": ["Q75386059", "Q30302866", "Q75386062"],
                "children": ["Q75386064", "Q75386067", "Q75386069", "Q75386061"]
            },
            "main": false
        }, {
            "id": "Q3557487",
            "data": {
                "fn": "Victor",
                "ln": "Oliver",
                "desc": "actor and radio comedian (1898-1964)",
                "label": "Vic Oliver",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q2405785"], "children": []},
            "main": false
        }, {
            "id": "Q75386076",
            "data": {
                "fn": "Antony",
                "ln": "",
                "desc": "(died 1957)",
                "label": "Antony Beauchamp Entwistle",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q2405785"], "children": []},
            "main": false
        }, {
            "id": "Q75386006",
            "data": {
                "fn": "June",
                "ln": "Osborne Spencer-Churchill",
                "desc": "(1922-1980)",
                "label": "June Osborne",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q183105"], "children": ["Q2859344"]},
            "main": false
        }, {
            "id": "Q3133116",
            "data": {
                "fn": "Thomas",
                "ln": "",
                "desc": "English peer (1913–1963)",
                "label": "Thomas Touchet-Jesson, 23rd Baron Audley",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q2405785"], "children": []},
            "main": false
        }, {
            "id": "Q203129",
            "data": {
                "fn": "Duncan",
                "ln": "Sandys",
                "desc": "British politician (1908-1987)",
                "label": "Duncan Sandys",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/d9/Duncan_Sandys_1975.png",
                "gender": "M"
            },
            "rels": {"spouses": ["Q5271122"], "children": ["Q75386034", "Q5346952", "Q75386057"]},
            "main": false
        }, {
            "id": "Q42083828",
            "data": {
                "fn": "Henrietta",
                "ln": "",
                "desc": "noblewoman; wife of Henry Montague Hozier, born 1852 November 08; died 1925 March 23",
                "label": "Henrietta Ogilvy",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q16714247", "Q2004836"], "children": ["Q263454"]},
            "main": false
        }, {
            "id": "Q75386090",
            "data": {
                "fn": "Jeremy",
                "ln": "Soames",
                "desc": "(born 1952)",
                "label": "Jeremy Bernard Soames",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q336050", "mother": "Q508525", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q13408312",
            "data": {
                "fn": "Charlotte",
                "ln": "Soames",
                "desc": "(born 1954)",
                "label": "Charlotte Soames",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q336050", "mother": "Q508525", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3052477",
            "data": {
                "fn": "Emma",
                "ln": "Soames",
                "desc": "British editor",
                "label": "Emma Soames",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q336050", "mother": "Q508525", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3453283",
            "data": {
                "fn": "Rupert",
                "ln": "Soames",
                "desc": "British businessman",
                "label": "Rupert Soames",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q336050", "mother": "Q508525", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q263454",
            "data": {
                "fn": "Clementine",
                "ln": "Hozier",
                "desc": "Wife of Winston Churchill and life peer (1885–1977)",
                "label": "Clementine Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fc/Clementine_Churchill_1915.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q2004836",
                "mother": "Q42083828",
                "spouses": ["Q8016"],
                "children": ["Q183105", "Q13408289", "Q508525", "Q5271122", "Q2405785"]
            },
            "main": false
        }, {
            "id": "Q263454",
            "data": {
                "fn": "Clementine",
                "ln": "Hozier",
                "desc": "Wife of Winston Churchill and life peer (1885–1977)",
                "label": "Clementine Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fc/Clementine_Churchill_1915.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q2004836",
                "mother": "Q42083828",
                "spouses": ["Q8016"],
                "children": ["Q183105", "Q13408289", "Q508525", "Q5271122", "Q2405785"]
            },
            "main": false
        }, {
            "id": "Q1819011",
            "data": {
                "fn": "Leonard",
                "ln": "Jerome",
                "desc": "American financier and maternal grandfather of Winston Churchill (1817-1891)",
                "label": "Leonard Jerome",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/ed/Leonard_Jerome_portrait.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q61750828"], "children": ["Q243011"]},
            "main": false
        }, {
            "id": "Q721915",
            "data": {
                "fn": "John Jack",
                "ln": "Churchill",
                "desc": "British military officer and businessman (1880–1947)",
                "label": "Jack Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/db/Jennie_Churchill_with_her_sons.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q314773", "mother": "Q243011", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q1465068",
            "data": {
                "fn": "George Frederick Myddelton",
                "ln": "",
                "desc": "British Army officer and author (1874-1951)",
                "label": "George Cornwallis-West",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/0c/Georgecornwalliswest.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q243011"], "children": []},
            "main": false
        }, {
            "id": "Q314773",
            "data": {
                "fn": "Randolph Henry",
                "ln": "Churchill Spencer-Churchill",
                "desc": "British politician, father of Winston Churchill (1849-1895)",
                "label": "Lord Randolph Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/86/Lord_Randolph_Churchill.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q333355",
                "mother": "Q3749340",
                "spouses": ["Q243011"],
                "children": ["Q8016", "Q721915"]
            },
            "main": false
        }, {
            "id": "Q263454",
            "data": {
                "fn": "Clementine",
                "ln": "Hozier",
                "desc": "Wife of Winston Churchill and life peer (1885–1977)",
                "label": "Clementine Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fc/Clementine_Churchill_1915.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q2004836",
                "mother": "Q42083828",
                "spouses": ["Q8016"],
                "children": ["Q183105", "Q13408289", "Q508525", "Q5271122", "Q2405785"]
            },
            "main": false
        }, {
            "id": "Q332528",
            "data": {
                "fn": "Winston",
                "ln": "Churchill",
                "desc": "British politician (1940–2010)",
                "label": "Winston Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/89/Winston_Spencer-Churchill_%281997%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q183105", "mother": "Q2723519", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2723519",
            "data": {
                "fn": "Pamela Beryl",
                "ln": "Harriman Digby",
                "desc": "American diplomat (1920-1997)",
                "label": "Pamela Harriman",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/0/00/Pamela_Harriman.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q183105"], "children": ["Q332528"]},
            "main": false
        }, {
            "id": "Q721915",
            "data": {
                "fn": "John Jack",
                "ln": "Churchill",
                "desc": "British military officer and businessman (1880–1947)",
                "label": "Jack Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/db/Jennie_Churchill_with_her_sons.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q314773", "mother": "Q243011", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2004836",
            "data": {
                "fn": "George William",
                "ln": "Middleton",
                "desc": "English horseman, equerry to John Spencer, 5th Earl Spencer (1846-1892)",
                "label": "George Middleton",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2b/William_George_Middleton_Vanity_Fair_30_June_1883.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q42083828"], "children": ["Q263454"]},
            "main": false
        }, {
            "id": "Q336050",
            "data": {
                "fn": "Christopher",
                "ln": "Soames",
                "desc": "British politician (1920–1987)",
                "label": "Christopher Soames",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/4e/Christopher_Soames.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q508525"], "children": ["Q390192", "Q3052477", "Q3453283", "Q13408312", "Q75386090"]},
            "main": false
        }, {
            "id": "Q390192",
            "data": {
                "fn": "Nicholas Arthur Winston",
                "ln": "Soames",
                "desc": "British politician",
                "label": "Nicholas Soames",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/9f/Official_portrait_of_Sir_Nicholas_Soames_crop_2.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q336050", "mother": "Q508525", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q16714247",
            "data": {
                "fn": "Henry",
                "ln": "",
                "desc": "British army officer and business administrator",
                "label": "Henry Hozier",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/68/Henry_Montague_Hozier_Vanity_Fair_1883-02-10.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q42083828"], "children": []},
            "main": false
        }, {
            "id": "Q3749340",
            "data": {
                "fn": "Frances",
                "ln": "Vane Spencer-Churchill",
                "desc": "British duchess (1822-1899)",
                "label": "Frances Anne Spencer-Churchill, Duchess of Marlborough",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/69/Photograph_of_Frances_Anne_Spencer-Churchill.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q333355"], "children": ["Q314773"]},
            "main": false
        }, {
            "id": "Q2859344",
            "data": {
                "fn": "Arabella",
                "ln": "Churchill",
                "desc": "English charity founder, festival co-founder, and fundraiser",
                "label": "Arabella Bob Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/d/d5/Arabella_Spencer-Churchill_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q183105", "mother": "Q75386006", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q263454",
            "data": {
                "fn": "Clementine",
                "ln": "Hozier",
                "desc": "Wife of Winston Churchill and life peer (1885–1977)",
                "label": "Clementine Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fc/Clementine_Churchill_1915.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q2004836",
                "mother": "Q42083828",
                "spouses": ["Q8016"],
                "children": ["Q183105", "Q13408289", "Q508525", "Q5271122", "Q2405785"]
            },
            "main": false
        }, {
            "id": "Q333355",
            "data": {
                "fn": "John Winston",
                "ln": "Spencer-Churchill",
                "desc": "British conservative cabinet minister, politician and nobleman (1822-1883)",
                "label": "John Spencer-Churchill, 7th Duke of Marlborough",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/f6/John_Spencer-Churchill%2C_7th_Duke_of_Marlborough.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q3749340"], "children": ["Q314773"]},
            "main": false
        }, {
            "id": "Q263454",
            "data": {
                "fn": "Clementine",
                "ln": "Hozier",
                "desc": "Wife of Winston Churchill and life peer (1885–1977)",
                "label": "Clementine Churchill",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fc/Clementine_Churchill_1915.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q2004836",
                "mother": "Q42083828",
                "spouses": ["Q8016"],
                "children": ["Q183105", "Q13408289", "Q508525", "Q5271122", "Q2405785"]
            },
            "main": false
        }, {
            "id": "Q75386064",
            "data": {
                "fn": "Dan",
                "ln": "",
                "desc": "(born 1971)",
                "label": "Dominic Walters",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q75386062", "mother": "Q75386057", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75386069",
            "data": {
                "fn": "Sophie",
                "ln": "",
                "desc": "(born 1988)",
                "label": "Sophie Rachel Perkins",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q30302866", "mother": "Q75386057", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75386067",
            "data": {
                "fn": "Alexander",
                "ln": "Perkins",
                "desc": "(born 1986)",
                "label": "Alexander Winston Duncan Perkins",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q30302866", "mother": "Q75386057", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75386059",
            "data": {
                "fn": "Michael",
                "ln": "Kennedy",
                "desc": "Peerage person ID=106245",
                "label": "Michael Kennedy",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q75386057"], "children": ["Q75386061"]},
            "main": false
        }, {
            "id": "Q75386062",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "Peerage person ID=106247",
                "label": "Sir Dennis Walters",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q75386057"], "children": ["Q75386064"]},
            "main": false
        }, {
            "id": "Q75386061",
            "data": {
                "fn": "Justin",
                "ln": "Kennedy",
                "desc": "(born 1967)",
                "label": "Justin Kennedy",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q75386059", "mother": "Q75386057", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q30302866",
            "data": {
                "fn": "Kenneth",
                "ln": "Perkins",
                "desc": "British Army general",
                "label": "Ken Perkins",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q75922694",
                "mother": "Q75922696",
                "spouses": ["Q75922697", "Q75386057"],
                "children": ["Q75922700", "Q75922703", "Q75922704", "Q75386067", "Q75386069"]
            },
            "main": false
        }, {
            "id": "Q75386062",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "Peerage person ID=106247",
                "label": "Sir Dennis Walters",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q75386057"], "children": ["Q75386064"]},
            "main": false
        }, {
            "id": "Q75386061",
            "data": {
                "fn": "Justin",
                "ln": "Kennedy",
                "desc": "(born 1967)",
                "label": "Justin Kennedy",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q75386059", "mother": "Q75386057", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q30302866",
            "data": {
                "fn": "Kenneth",
                "ln": "Perkins",
                "desc": "British Army general",
                "label": "Ken Perkins",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q75922694",
                "mother": "Q75922696",
                "spouses": ["Q75922697", "Q75386057"],
                "children": ["Q75922700", "Q75922703", "Q75922704", "Q75386067", "Q75386069"]
            },
            "main": false
        }, {
            "id": "Q30302866",
            "data": {
                "fn": "Kenneth",
                "ln": "Perkins",
                "desc": "British Army general",
                "label": "Ken Perkins",
                "avatar": null,
                "gender": "M"
            },
            "rels": {
                "father": "Q75922694",
                "mother": "Q75922696",
                "spouses": ["Q75922697", "Q75386057"],
                "children": ["Q75922700", "Q75922703", "Q75922704", "Q75386067", "Q75386069"]
            },
            "main": false
        }, {
            "id": "Q75922704",
            "data": {
                "fn": "",
                "ln": "Perkins",
                "desc": "Peerage person ID=405447",
                "label": "Nicola Perkins",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q30302866", "mother": "Q75922697", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75922700",
            "data": {
                "fn": "Mo",
                "ln": "Perkins",
                "desc": "Peerage person ID=405445",
                "label": "Mo Perkins",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q30302866", "mother": "Q75922697", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75922703",
            "data": {
                "fn": "Jane",
                "ln": "Perkins",
                "desc": "Peerage person ID=405446",
                "label": "Jane Perkins",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q30302866", "mother": "Q75922697", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q75922696",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "Peerage person ID=405443",
                "label": "Arabella Sarah Wise",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q75922694"], "children": ["Q30302866"]},
            "main": false
        }, {
            "id": "Q75922694",
            "data": {
                "fn": "George",
                "ln": "",
                "desc": "Peerage person ID=405442",
                "label": "George Samuel Perkins",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q75922696"], "children": ["Q30302866"]},
            "main": false
        }, {
            "id": "Q75922697",
            "data": {
                "fn": "Anne",
                "ln": "",
                "desc": "Peerage person ID=405444",
                "label": "Anne Theresa Barry",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q30302866"], "children": ["Q75922700", "Q75922703", "Q75922704"]},
            "main": false
        }, {
            "id": "Q23784752",
            "data": {
                "fn": "Mark",
                "ln": "Bezos",
                "desc": "volunteer firefighter; works at Robin Hood, a poverty-fighting charity in New York City",
                "label": "Mark Bezos",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q97748633", "mother": "Q92464290", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q97748633",
            "data": {
                "fn": "Miguel Ángel",
                "ln": "Bezos",
                "desc": "Cuba-born engineer (1944-2015)",
                "label": "Miguel Bezos",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q92464290"], "children": ["Q23784752"]},
            "main": false
        }, {
            "id": "Q97749941",
            "data": {
                "fn": "Ted",
                "ln": "Jorgensen",
                "desc": "American unicycle hockey player & biological father of Jeff Bezos (1944-2015)",
                "label": "Ted Jorgensen",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q92464290"], "children": ["Q312556"]},
            "main": false
        }, {
            "id": "Q23784752",
            "data": {
                "fn": "Mark",
                "ln": "Bezos",
                "desc": "volunteer firefighter; works at Robin Hood, a poverty-fighting charity in New York City",
                "label": "Mark Bezos",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q97748633", "mother": "Q92464290", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q5213754",
            "data": {
                "fn": "Dan",
                "ln": "Jewett",
                "desc": "American journalist",
                "label": "Dan Jewett",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q10322797"], "children": []},
            "main": false
        }, {
            "id": "Q10322797",
            "data": {
                "fn": "MacKenzie S.",
                "ln": "Tuttle Bezos Tuttle Scott",
                "desc": "American philanthropist and novelist",
                "label": "MacKenzie Scott",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/16/MacKenzie_Scott.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q312556", "Q5213754"], "children": ["Q102433534", "Q102433548", "Q102433555"]},
            "main": false
        }, {
            "id": "Q10322797",
            "data": {
                "fn": "MacKenzie S.",
                "ln": "Tuttle Bezos Tuttle Scott",
                "desc": "American philanthropist and novelist",
                "label": "MacKenzie Scott",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/16/MacKenzie_Scott.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q312556", "Q5213754"], "children": ["Q102433534", "Q102433548", "Q102433555"]},
            "main": false
        }, {
            "id": "Q10322797",
            "data": {
                "fn": "MacKenzie S.",
                "ln": "Tuttle Bezos Tuttle Scott",
                "desc": "American philanthropist and novelist",
                "label": "MacKenzie Scott",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/1/16/MacKenzie_Scott.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q312556", "Q5213754"], "children": ["Q102433534", "Q102433548", "Q102433555"]},
            "main": false
        }, {
            "id": "Q26220952",
            "data": {
                "fn": "Yvette",
                "ln": "",
                "desc": "Model; second wife of basketball player Michael Jordan",
                "label": "Yvette Prieto",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q41421"], "children": ["Q26220954", "Q26220955"]},
            "main": false
        }, {
            "id": "Q26220952",
            "data": {
                "fn": "Yvette",
                "ln": "",
                "desc": "Model; second wife of basketball player Michael Jordan",
                "label": "Yvette Prieto",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q41421"], "children": ["Q26220954", "Q26220955"]},
            "main": false
        }, {
            "id": "Q55819653",
            "data": {
                "fn": "Roslyn",
                "ln": "Jordan",
                "desc": "one of basketball player Michael Jordan's sisters",
                "label": "Roslyn Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3161193", "mother": "Q29348175", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q55820302",
            "data": {
                "fn": "Deloris E.",
                "ln": "Jordan",
                "desc": "one of basketball player Michael Jordan's sisters",
                "label": "Deloris E. Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3161193", "mother": "Q29348175", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q107325453",
            "data": {
                "fn": "Rosa",
                "ln": "Jordan",
                "desc": "6 Sep 1919 - 4 Dec 1988",
                "label": "Rosa Bell Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q107325452"], "children": ["Q3161193"]},
            "main": false
        }, {
            "id": "Q55819312",
            "data": {
                "fn": "Larry",
                "ln": "Jordan",
                "desc": "one of basketball player Michael Jordan's brothers",
                "label": "Larry Jordan",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3161193", "mother": "Q29348175", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q107325452",
            "data": {
                "fn": "William",
                "ln": "Jordan",
                "desc": "2 Mar 1915 - 3 Jul 1990",
                "label": "William Edward Jordan",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q107325453"], "children": ["Q3161193"]},
            "main": false
        }, {
            "id": "Q55819493",
            "data": {
                "fn": "James",
                "ln": "Jordan",
                "desc": "one of basketball player Michael Jordan's brothers",
                "label": "James Jordan Jr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3161193", "mother": "Q29348175", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q29348175",
            "data": {
                "fn": "Deloris",
                "ln": "Peoples Jordan",
                "desc": "American banker, mother of basketball player Michael Jordan",
                "label": "Deloris Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q3161193"],
                "children": ["Q41421", "Q55819312", "Q55819493", "Q55819653", "Q55820302"]
            },
            "main": false
        }, {
            "id": "Q6758256",
            "data": {
                "fn": "Marcus",
                "ln": "Jordan",
                "desc": "American basketball player; son of basketball player Michael Jordan",
                "label": "Marcus Jordan",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q41421", "mother": "Q26220958", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q55820302",
            "data": {
                "fn": "Deloris E.",
                "ln": "Jordan",
                "desc": "one of basketball player Michael Jordan's sisters",
                "label": "Deloris E. Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3161193", "mother": "Q29348175", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q55819493",
            "data": {
                "fn": "James",
                "ln": "Jordan",
                "desc": "one of basketball player Michael Jordan's brothers",
                "label": "James Jordan Jr.",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3161193", "mother": "Q29348175", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q55819653",
            "data": {
                "fn": "Roslyn",
                "ln": "Jordan",
                "desc": "one of basketball player Michael Jordan's sisters",
                "label": "Roslyn Jordan",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3161193", "mother": "Q29348175", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q55819312",
            "data": {
                "fn": "Larry",
                "ln": "Jordan",
                "desc": "one of basketball player Michael Jordan's brothers",
                "label": "Larry Jordan",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3161193", "mother": "Q29348175", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q6176081",
            "data": {
                "fn": "Jeffrey",
                "ln": "Jordan",
                "desc": "American college basketball player, one of the sons of basketball player Michael Jordan",
                "label": "Jeffrey Jordan",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/f/fb/Jeffrey_Jordan_Illinois.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q41421", "mother": "Q26220958", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q42682869",
            "data": {
                "fn": "Elizabeth",
                "ln": "Grau",
                "desc": "Donald Trump's sister, married to James Walter Grau",
                "label": "Elizabeth Trump Grau",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3752663", "mother": "Q22952511", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q96198111",
            "data": {
                "fn": "Malcolm",
                "ln": "MacLeod",
                "desc": "(1866-1954)",
                "label": "Malcolm MacLeod",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q96198112"], "children": ["Q22952511"]},
            "main": false
        }, {
            "id": "Q96198112",
            "data": {
                "fn": "",
                "ln": "Smith",
                "desc": "(1867-1963)",
                "label": "Mary Smith",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q96198111"], "children": ["Q22952511"]},
            "main": false
        }, {
            "id": "Q28748031",
            "data": {
                "fn": "Robert Stewart",
                "ln": "Trump",
                "desc": "US business executive and real estate developer (1948-2020)",
                "label": "Robert Trump",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3752663", "mother": "Q22952511", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23000827",
            "data": {
                "fn": "Chloe Sophia",
                "ln": "Trump",
                "desc": "daughter of Donald Trump Jr.",
                "label": "Chloe Trump",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3713655", "mother": "Q4461939", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23000825",
            "data": {
                "fn": "Donald",
                "ln": "Trump",
                "desc": "son of Donald Trump Jr.",
                "label": "Donald Trump III",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3713655", "mother": "Q4461939", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23000826",
            "data": {
                "fn": "Tristan Milos",
                "ln": "Trump",
                "desc": "son of Donald Trump, Jr.",
                "label": "Tristan Trump",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3713655", "mother": "Q4461939", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23000828",
            "data": {
                "fn": "Spencer Frederick",
                "ln": "Trump",
                "desc": "American child, son of Donald Trump Jr. and grandson of US president Donald Trump Snr.",
                "label": "Spencer Frederick Trump",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3713655", "mother": "Q4461939", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q42682724",
            "data": {
                "fn": "Frederick Christ",
                "ln": "Trump",
                "desc": "American airplane pilot; elder brother of Donald Trump",
                "label": "Fred Trump Jr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/75/Fred_Trump_Jr._1966_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q3752663", "mother": "Q22952511", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q92463661",
            "data": {
                "fn": "Carolina Dorothy",
                "ln": "Trump",
                "desc": "no description",
                "label": "Carolina Dorothy Trump",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3731533", "mother": "Q29033452", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q92463701",
            "data": {
                "fn": "Eric Luke",
                "ln": "Trump",
                "desc": "no description",
                "label": "Eric Luke Trump",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3731533", "mother": "Q29033452", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q104149822",
            "data": {
                "fn": "Stanley Edward",
                "ln": "Maples",
                "desc": "American real estate developer; father of Marla Maples",
                "label": "Stanley Edward Maples",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["79a785e3-1a1f-4d2e-ab15-53e37dcdae5a"], "children": ["Q2597050"]},
            "main": false
        }, {
            "id": "Q23000821",
            "data": {
                "fn": "Joseph",
                "ln": "Kushner",
                "desc": "no description",
                "label": "Joseph Frederick Kushner",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q13628723", "mother": "Q239411", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23000820",
            "data": {
                "fn": "Arabella",
                "ln": "Kushner",
                "desc": "no description",
                "label": "Arabella Rose Kushner",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q13628723", "mother": "Q239411", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3752663",
            "data": {
                "fn": "Fred Christ Frederick",
                "ln": "Trump",
                "desc": "American real estate developer; father of Donald Trump (1905–1999)",
                "label": "Fred Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e3/Fred_Trump_in_the_1980s.jpg",
                "gender": "M"
            },
            "rels": {
                "father": "Q21070387",
                "mother": "Q23600580",
                "spouses": ["Q22952511"],
                "children": ["Q736223", "Q42682724", "Q28748031", "Q42682869", "Q22686"]
            },
            "main": false
        }, {
            "id": "Q98105914",
            "data": {
                "fn": "Michael",
                "ln": "Boulos",
                "desc": "American business executive and Tiffany Trump's partner",
                "label": "Michael Boulos",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q12071552"], "children": []},
            "main": false
        }, {
            "id": "Q736223",
            "data": {
                "fn": "Maryanne",
                "ln": "Trump Desmond Barry",
                "desc": "American judge (1937–2023)",
                "label": "Maryanne Trump Barry",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/62/Maryanne_Trump_Barry.png",
                "gender": "F"
            },
            "rels": {"father": "Q3752663", "mother": "Q22952511", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23823122",
            "data": {
                "fn": "Amalija",
                "ln": "Knavs",
                "desc": "Mother of Melania Trump (1945–2024)",
                "label": "Amalija Knavs",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q23000811"], "children": ["Q432473"]},
            "main": false
        }, {
            "id": "Q23000811",
            "data": {
                "fn": "Viktor",
                "ln": "Knavs",
                "desc": "Slovene car dealer, father of Melania Trump",
                "label": "Viktor Knavs",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q23823122"], "children": ["Q432473"]},
            "main": false
        }, {
            "id": "Q130961941",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "no description",
                "label": "Riccardo Mazzucchelli",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q242351"], "children": []},
            "main": false
        }, {
            "id": "Q42682869",
            "data": {
                "fn": "Elizabeth",
                "ln": "Grau",
                "desc": "Donald Trump's sister, married to James Walter Grau",
                "label": "Elizabeth Trump Grau",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"father": "Q3752663", "mother": "Q22952511", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q130961825",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "no description",
                "label": "Alfred Winklmayr",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q242351"], "children": []},
            "main": false
        }, {
            "id": "Q130962937",
            "data": {
                "fn": "",
                "ln": "",
                "desc": "no description",
                "label": "Marie Zelníčková",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q104176774"], "children": ["Q242351"]},
            "main": false
        }, {
            "id": "Q3941615",
            "data": {
                "fn": "Rossano",
                "ln": "",
                "desc": "Italian actor",
                "label": "Rossano Rubicondi",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q242351"], "children": []},
            "main": false
        }, {
            "id": "Q104176774",
            "data": {
                "fn": "Miloš",
                "ln": "Zelníček",
                "desc": "father of Ivana Trump",
                "label": "Miloš Zelníček",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"spouses": ["Q130962937"], "children": ["Q242351"]},
            "main": false
        }, {
            "id": "Q28748031",
            "data": {
                "fn": "Robert Stewart",
                "ln": "Trump",
                "desc": "US business executive and real estate developer (1948-2020)",
                "label": "Robert Trump",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q3752663", "mother": "Q22952511", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q23647575",
            "data": {
                "fn": "Theodore",
                "ln": "Kushner",
                "desc": "grandson of Donald Trump",
                "label": "Theodore James Kushner",
                "avatar": null,
                "gender": "M"
            },
            "rels": {"father": "Q13628723", "mother": "Q239411", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q432473",
            "data": {
                "fn": "Melania",
                "ln": "Trump Knavs",
                "desc": "First Lady of the United States (2017–2021), model, and businesswoman",
                "label": "Melania Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/82/Melania_Trump_official_portrait.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q23000811", "mother": "Q23823122", "spouses": ["Q22686"], "children": ["Q23000814"]},
            "main": false
        }, {
            "id": "Q23000822",
            "data": {
                "fn": "Kai Madison",
                "ln": "Trump",
                "desc": "Donald Trump Jr.'s daughter",
                "label": "Kai Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/5/5b/Kai_Trump_at_Inaugural_parade_presidential_review_stand_01-20-17.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q3713655", "mother": "Q4461939", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q4461939",
            "data": {
                "fn": "Vanessa",
                "ln": "Trump Haydon",
                "desc": "Ex-wife of Donald Trump Jr.",
                "label": "Vanessa Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/4/40/VanessaTrump2017.jpg",
                "gender": "F"
            },
            "rels": {
                "spouses": ["Q3713655"],
                "children": ["Q23000822", "Q23000825", "Q23000826", "Q23000827", "Q23000828"]
            },
            "main": false
        }, {
            "id": "Q29033452",
            "data": {
                "fn": "Lara",
                "ln": "Trump",
                "desc": "American television producer and campaign adviser",
                "label": "Lara Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/8/85/Lara_Trump_%2851247638503%29_%28cropped%29.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q3731533"], "children": ["Q92463701", "Q92463661"]},
            "main": false
        }, {
            "id": "Q736223",
            "data": {
                "fn": "Maryanne",
                "ln": "Trump Desmond Barry",
                "desc": "American judge (1937–2023)",
                "label": "Maryanne Trump Barry",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/62/Maryanne_Trump_Barry.png",
                "gender": "F"
            },
            "rels": {"father": "Q3752663", "mother": "Q22952511", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q2597050",
            "data": {
                "fn": "Marla",
                "ln": "Maples Trump",
                "desc": "American actress and TV personality (born 1963)",
                "label": "Marla Maples",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/2/2f/Marla_Maples_LF_crop.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q104149822", "spouses": ["Q22686"], "children": ["Q12071552"]},
            "main": false
        }, {
            "id": "Q13628723",
            "data": {
                "fn": "Jared Corey",
                "ln": "Kushner",
                "desc": "Senior Advisor to the President of the United States from 2017 to 2021",
                "label": "Jared Kushner",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/a/a4/Jared_Kushner_2018.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q239411"], "children": ["Q23000820", "Q23000821", "Q23647575"]},
            "main": false
        }, {
            "id": "Q242351",
            "data": {
                "fn": "Ivana Marie",
                "ln": "Trump",
                "desc": "Czech-American businesswoman (1949–2022)",
                "label": "Ivana Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/cd/Ivana_Trump_cropped_retouched.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q104176774",
                "mother": "Q130962937",
                "spouses": ["Q130961825", "Q22686", "Q130961941", "Q3941615"],
                "children": ["Q3713655", "Q239411", "Q3731533"]
            },
            "main": false
        }, {
            "id": "Q242351",
            "data": {
                "fn": "Ivana Marie",
                "ln": "Trump",
                "desc": "Czech-American businesswoman (1949–2022)",
                "label": "Ivana Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/cd/Ivana_Trump_cropped_retouched.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q104176774",
                "mother": "Q130962937",
                "spouses": ["Q130961825", "Q22686", "Q130961941", "Q3941615"],
                "children": ["Q3713655", "Q239411", "Q3731533"]
            },
            "main": false
        }, {
            "id": "Q42682724",
            "data": {
                "fn": "Frederick Christ",
                "ln": "Trump",
                "desc": "American airplane pilot; elder brother of Donald Trump",
                "label": "Fred Trump Jr.",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/7/75/Fred_Trump_Jr._1966_%28cropped%29.jpg",
                "gender": "M"
            },
            "rels": {"father": "Q3752663", "mother": "Q22952511", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q21070387",
            "data": {
                "fn": "Frederick Friedrich",
                "ln": "Trump",
                "desc": "American businessman (1869–1918)",
                "label": "Frederick Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/6/6e/Frederick_Friedrich_Trump_2.jpg",
                "gender": "M"
            },
            "rels": {"spouses": ["Q23600580"], "children": ["Q3752663"]},
            "main": false
        }, {
            "id": "Q23600580",
            "data": {
                "fn": "Elizabeth",
                "ln": "Trump Christ",
                "desc": "German-American businesswoman (1880-1966)",
                "label": "Elizabeth Christ",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/33/Elisabeth_Christ.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q21070387"], "children": ["Q3752663"]},
            "main": false
        }, {
            "id": "Q242351",
            "data": {
                "fn": "Ivana Marie",
                "ln": "Trump",
                "desc": "Czech-American businesswoman (1949–2022)",
                "label": "Ivana Trump",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/c/cd/Ivana_Trump_cropped_retouched.jpg",
                "gender": "F"
            },
            "rels": {
                "father": "Q104176774",
                "mother": "Q130962937",
                "spouses": ["Q130961825", "Q22686", "Q130961941", "Q3941615"],
                "children": ["Q3713655", "Q239411", "Q3731533"]
            },
            "main": false
        }, {
            "id": "Q28941744",
            "data": {
                "fn": "Joanne Carole",
                "ln": "Schieble Simpson",
                "desc": "American speech therapist. Steve Jobs' biologic mother",
                "label": "Joanne Carole Schieble Simpson",
                "avatar": null,
                "gender": "F"
            },
            "rels": {"spouses": ["Q12605967"], "children": ["Q19837", "Q238331"]},
            "main": false
        }, {
            "id": "Q3133593",
            "data": {
                "fn": "Laurene",
                "ln": "Jobs Powell",
                "desc": "American political activist, business executive, philanthropist, heiress, billionaire",
                "label": "Laurene Powell Jobs",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/97/Laurene_Powell_Jobs.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q19837"], "children": ["Q20895861", "Q20895866", "Q20895867"]},
            "main": false
        }, {
            "id": "Q238331",
            "data": {
                "fn": "Mona",
                "ln": "Simpson",
                "desc": "American novelist",
                "label": "Mona Simpson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e7/Simpson%2C_Mona_MBFI.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q12605967", "mother": "Q28941744", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q3133593",
            "data": {
                "fn": "Laurene",
                "ln": "Jobs Powell",
                "desc": "American political activist, business executive, philanthropist, heiress, billionaire",
                "label": "Laurene Powell Jobs",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/97/Laurene_Powell_Jobs.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q19837"], "children": ["Q20895861", "Q20895866", "Q20895867"]},
            "main": false
        }, {
            "id": "Q238331",
            "data": {
                "fn": "Mona",
                "ln": "Simpson",
                "desc": "American novelist",
                "label": "Mona Simpson",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/e/e7/Simpson%2C_Mona_MBFI.jpg",
                "gender": "F"
            },
            "rels": {"father": "Q12605967", "mother": "Q28941744", "spouses": [], "children": []},
            "main": false
        }, {
            "id": "Q18810921",
            "data": {
                "fn": "Chrisann",
                "ln": "Brennan",
                "desc": "American painter",
                "label": "Chrisann Brennan",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/3/3d/Chrisann_Brennan_in_1972_Pegasus.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q19837"], "children": ["Q2983236"]},
            "main": false
        }, {
            "id": "Q3133593",
            "data": {
                "fn": "Laurene",
                "ln": "Jobs Powell",
                "desc": "American political activist, business executive, philanthropist, heiress, billionaire",
                "label": "Laurene Powell Jobs",
                "avatar": "https://upload.wikimedia.org/wikipedia/commons/9/97/Laurene_Powell_Jobs.jpg",
                "gender": "F"
            },
            "rels": {"spouses": ["Q19837"], "children": ["Q20895861", "Q20895866", "Q20895867"]},
            "main": false
        }, {
            "id": "fb0668dd-f150-4994-8ecf-8191ac40c03f",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q35723119"], "children": ["Q104721244"]},
            "to_add": true,
            "main": false
        }, {
            "id": "4a0ba51f-7d19-4010-bfb5-5af247a3d4a9",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q723488"], "children": ["Q102197117"]},
            "to_add": true,
            "main": false
        }, {
            "id": "ed8458d6-85ce-43b4-96ba-5e8d59772c36",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q4079744"], "children": ["Q5921204"]},
            "to_add": true,
            "main": false
        }, {
            "id": "dc648427-943f-4053-bd88-3e6284e40962",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q7173047"], "children": ["Q102196932"]},
            "to_add": true,
            "main": false
        }, {
            "id": "fc3b4929-b8e3-4c3a-9af0-e6687cc0e47d",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q41421"], "children": ["Q107325744"]},
            "to_add": true,
            "main": false
        }, {
            "id": "6a19a176-bbb2-4458-9c53-c0e7c3d7e7a1",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q25369"], "children": ["Q103971696", "Q103971795"]},
            "to_add": true,
            "main": false
        }, {
            "id": "8e092bb9-9f30-4bbd-a1ad-cdb2fac13602",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q107338233"], "children": ["Q107338232"]},
            "to_add": true,
            "main": false
        }, {
            "id": "786523e5-c164-429a-9701-0ff32d7687ce",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q107338232"], "children": ["Q40096"]},
            "to_add": true,
            "main": false
        }, {
            "id": "c3709839-9cc1-4a5e-8c99-f51142d9306d",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q5944264"], "children": ["Q102868699"]},
            "to_add": true,
            "main": false
        }, {
            "id": "39a42816-cd19-4495-b263-ed892ac633e6",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q15982328"], "children": ["Q649593"]},
            "to_add": true,
            "main": false
        }, {
            "id": "d704c83a-f3c4-4765-b5d3-c49629cf559d",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q649593"], "children": ["Q15982326", "Q15982167", "Q15982309", "Q15982322"]},
            "to_add": true,
            "main": false
        }, {
            "id": "ae7240dd-1a30-4d7b-aef8-907a07695792",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q1508559"], "children": ["Q83489957", "Q104680414"]},
            "to_add": true,
            "main": false
        }, {
            "id": "f5279e46-91a4-467a-ab66-aea24d09ac96",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q16859631"], "children": ["Q257464"]},
            "to_add": true,
            "main": false
        }, {
            "id": "4a668185-bf5e-4943-a56c-8f6e7b53966c",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q11239932"], "children": ["Q58476763"]},
            "to_add": true,
            "main": false
        }, {
            "id": "d3d58f7b-18d1-4be2-8469-ae41d328d57f",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q5401423"], "children": ["Q6263272"]},
            "to_add": true,
            "main": false
        }, {
            "id": "6fd3c966-f6ac-4844-89bf-c88d6685f3a9",
            "data": {"gender": "M"},
            "rels": {"spouses": ["Q241535"], "children": ["Q22344319"]},
            "to_add": true,
            "main": false
        }, {
            "id": "3211ab53-2865-46f4-b419-3f8c7a2f5a6c",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q3302174"], "children": ["Q56230675"]},
            "to_add": true,
            "main": false
        }, {
            "id": "9a9dbd34-14f4-4e15-8780-f0c268ae7e4b",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q163816"], "children": ["Q4160519"]},
            "to_add": true,
            "main": false
        }, {
            "id": "ca9992b5-a8f6-40d5-b916-f6522f275a81",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q855"], "children": ["Q3302174"]},
            "to_add": true,
            "main": false
        }, {
            "id": "8c0b3f32-bf5f-4589-990a-248f459291c3",
            "data": {"gender": "M"},
            "rels": {"spouses": ["Q106695809"], "children": ["Q463877"]},
            "to_add": true,
            "main": false
        }, {
            "id": "ebf69e1d-3b58-495a-a33c-f153e436a005",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q3319490"], "children": ["Q6216378"]},
            "to_add": true,
            "main": false
        }, {
            "id": "f9ebe325-4ffd-4d26-87ca-d4232af18ffd",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q1332918"], "children": ["Q4416801"]},
            "to_add": true,
            "main": false
        }, {
            "id": "79a785e3-1a1f-4d2e-ab15-53e37dcdae5a",
            "data": {"gender": "F"},
            "rels": {"spouses": ["Q104149822"], "children": ["Q2597050"]},
            "to_add": true,
            "main": false
        }];

        document.addEventListener("DOMContentLoaded", function () {

            document.querySelector("#FamilyChart").style.height = Math.floor(window.innerHeight * 0.85) + 'px';

            // Create the chart
            const chart = f3.createChart('#FamilyChart', data)
                .setTransitionTime(1000)
                .setCardXSpacing(250)
                .setCardYSpacing(150)

            chart.setCardHtml()
                .setCardDisplay([["label"], ["birthday"]]).setCardDim({h: 70});

            chart.updateMainId('Q43274')

            chart.updateTree({initial: true});

            setTimeout(() => {
                const tree = chart.store.getTree();
                const datum = tree.data[Math.floor(tree.data.length * Math.random())]  // random card
                f3.handlers.cardToMiddle({
                    datum,
                    svg: chart.svg,
                    svg_dim: chart.svg.getBoundingClientRect(),
                    transition_time: 2000
                })
            }, 4000)
        });


    </script>
@endsection
