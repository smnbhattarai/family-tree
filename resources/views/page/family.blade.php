@extends('layouts.app', [
    'pageTitle' => __('Family Tree')
])

@section('main_content')

    <div class="row">

        <div class="col-md-12">

            <div id="FamilyChart" class="f3" style="width:100%;height:500px;background-color: darkslategrey;"></div>

        </div>

    </div>

@endsection

@section('footerScript')
    <script>
        // Your family tree data

        const data = {!! $data !!}

        document.addEventListener("DOMContentLoaded", function () {

            document.querySelector("#FamilyChart").style.height = Math.floor(window.innerHeight * 0.92) + 'px';

            // Create the chart
            const chart = f3.createChart('#FamilyChart', data)
                .setTransitionTime(1000)
                .setCardXSpacing(250)
                .setCardYSpacing(150)

            chart.setCardHtml()
                .setCardDisplay([["label"]]).setCardDim({h: 70});

            chart.updateMainId({{ $mainId }})

            chart.updateTree({initial: true});

            setTimeout(() => {
                const tree = chart.store.getTree();
                console.log(tree.data);
                const datum = tree.data[0]  // random card
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
