@extends('header')
@section('content')
<img class="responsive" src="{{ URL :: to('images/bangladesh_photo.jpg') }}" width="900px">
<br>
<div class="row" style="padding-top : 3%;padding-bottom : 6%;">
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <div class="thumbnail">
                <img src="/images/somapuri.jpg" class="card-img-top img-thumbnail myclass" alt="...">
            </div>

            <div class="card-body">
                <h6 class="card-title">History of Sompur Bihar or Paharpur Buddhist Vihara</h6>
                <p class="card-text">
                    Somapura Mahavihara was situated in the middle of the capital of Pundravardhana Pundranagar
                    and the other city of the millionaire.
                </p>
                <a href="https://steemit.com/bangladesh/@riad360/history-of-sompur-bihar-or-paharpur-buddhist-vihara"
                    class="btn btn-primary" role="button">See More...</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <div class="thumbnail">
                <img src="/images/shat_gombuj.jpg" class="card-img-top img-thumbnail myclass" alt="...">
            </div>

            <div class="card-body">
                <h6 class="card-title">A visit to the Shat Gambuj Mosque</h6>
                <p class="card-text">The Khulna division is in the southwest part of Bangladesh contains one of
                    the country’s most historical, simple, yet impressive structures: the Shat Gambuj Mosque.
                </p>
                <a href="https://www.bangladesh.com/blog/bangladesh-a-visit-to-the-shat-gambuj-mosque/"
                    class="btn btn-primary" role="button">See More...</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <div class="thumbnail">
                <img src="/images/varindro_museum.jpg" class="card-img-top img-thumbnail myclass" alt="...">
            </div>
            <div class="card-body">
                <h6 class="card-title">Look Into the Past at Varendra Research Museum</h6>
                <p class="card-text">The massive collection held by the museum includes items that date as far
                    back as the sixteenth century and pays tribute to the history of the Muslim, Hindu and
                    Buddhist religions.</p>
                <a href="https://www.bangladesh.com/blog/look-into-the-past-at-varendra-research-museum/"
                    class="btn btn-primary" role="button">See More...</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <div class="thumbnail">
                <img src="/images/natore_rajbari.jpg" class="card-img-top img-thumbnail myclass" alt="...">
            </div>

            <div class="card-body">
                <h6 class="card-title">Explore the Cultural and Natural Wonders of Natore</h6>
                <p class="card-text">
                    The colorful and intricately adorned Natore Rajbari once served as the headquarters for
                    Ramjivan who is widely considered to be the real founder of the Raj family.
                </p>
                <a href="https://www.bangladesh.com/blog/explore-the-cultural-wonders-of-natore/"
                    class="btn btn-primary" role="button">See More...</a>
            </div>
        </div>
    </div>
</div>
</div>
<hr>
<div class="container">
    <div class="text-center center-block">
        <a style = "padding-right:2%;" href="https://www.facebook.com"target="_blank"><i id="social-fb"
                class="fa fa-facebook-square fa-3x social"></i></a>
        <a style = "padding-right:2%;" href="https://twitter.com"target="_blank"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
        <a style = "padding-right:2%;" href="https://plus.google.com"target="_blank"><i id="social-gp"
                class="fa fa-google-plus-square fa-3x social"></i></a>
        <a style = "padding-right:2%;" href="https://mail.google.com"target="_blank"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
    </div>
</div>

@endsection