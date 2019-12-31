@extends('layouts.home')

@section('content')
<div class="hero img">
    <h1 class="title">Uma nova maneira de vender e comprar!</h1>
    <h2 class="subtitle">De Z a A, anuncie a sua próxima compra!</h2>
    <h4 class="subsubtitle">Ao contrário das outras plataformas, o Nozama não lhe pergunta o que quer vender,
        <br>pergunta o que quer comprar.<br><br><br></h4>
    <button class="btn flat-primary" style="font-size: 15px;">Anunciar</button>
</div>
<div class="contents_homepage">
    <div class="highlights">
        <div class="highlights_title title">
            Destaques
        </div>
        <div class="highlights_contents">
            <div class=highlights_images_container>

                <div class=highlights_image>
                    <img src="https://via.placeholder.com/260x400?text=Placeholder+Image" alt="">
                    <div class="bottom-right">200€</div>
                </div>

                <div class=highlights_image>
                    <img src="https://via.placeholder.com/260x400?text=Placeholder+Image" alt="">
                    <div class="bottom-right">100€</div>
                </div>

                <div class=highlights_image>
                    <img src="https://via.placeholder.com/260x400?text=Placeholder+Image" alt="">
                    <div class="bottom-right">1005€</div>
                </div>

                <div class=highlights_image>
                    <img src="https://via.placeholder.com/260x400?text=Placeholder+Image" alt="">
                    <div class="bottom-right">4500€</div>
                </div>

                <div class=highlights_image>
                    <img src="https://via.placeholder.com/260x400?text=Placeholder+Image" alt="">
                    <div class="bottom-right">10€</div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <!--Headlines-->
    </div>
</div>

@endsection
