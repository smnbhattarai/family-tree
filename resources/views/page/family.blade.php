@extends('layouts.app', [
    'pageTitle' => __('Family Tree')
])

@section('main_content')

    <div class="row">

        <div class="col-md-12">

            <div id="FamilyChart" class="f3" style="width:100%;height:500px;background-color: darkslategrey"></div>

        </div>

    </div>

@endsection

@section('footerScript')
    <script>

        const data = {!! $data !!}

        document.addEventListener("DOMContentLoaded", function () {

            document.querySelector("#FamilyChart").style.height = Math.floor(window.innerHeight * 0.91) + 'px';

            // Create the chart
            const chart = f3.createChart('#FamilyChart', data)
                .setTransitionTime(1000)
                .setCardXSpacing(250)
                .setCardYSpacing(150)
                .setSortChildrenFunction((a, b) => a.data.gender === b.data.gender ? 0 : a.data.gender === 'M' ? 1 : -1)

            chart.setCardHtml()
                .setCardDisplay([["label"]]).setCardDim({h: 70});

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
                .attr("style", "position: absolute; top: 10px; left: 10px; width: 250px; z-index: 1000;")
                .on("focusout", () => {
                    setTimeout(() => {
                        if (!search_cont.node().contains(document.activeElement)) {
                            updateDropdown([]);
                        }
                    }, 200);
                })

            const search_input = search_cont.append("input")
                .attr("style", "width: 100%;")
                .attr("type", "text")
                .attr("placeholder", "Search")
                .on("focus", activateDropdown)
                .on("input", activateDropdown)

            const dropdown = search_cont.append("div").attr("style", "overflow-y: auto; max-height: 300px; background-color: darkslategrey; color: white;")
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
                    .attr("style", "padding: 5px;cursor: pointer;border-bottom: .5px solid currentColor;")
                    .on("click", (e, d) => {
                        updateTreeWithNewMainPerson(d.value, true)
                    })
                    .text(d => d.label)
            }

            // with person_id this function will update the tree
            function updateTreeWithNewMainPerson(person_id, animation_initial = true) {
                chart.updateMainId(person_id)
                chart.updateTree({initial: animation_initial})
            }
        });

    </script>
@endsection
