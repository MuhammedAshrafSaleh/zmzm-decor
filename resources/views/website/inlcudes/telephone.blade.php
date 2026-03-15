@php
    $message = "أريد حجز استشارة مجانية";
@endphp

<section class="telephone" id="telephone">
        <div class="container">
            <div class="telephone__body">
                <div class="telephone__content wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
                    <img src="{{ url('imgs/phone.gif') }}" class="telephone__icon" alt="zmzm-telephone">
                    <h3 class="main__heading"> الاستشارة <span>المجانية </span> </h3>
                    <p class="secondary__text">أفضل ما يميزنا أننا قريبون منك بطرق بسيطة ومختلفة</p>
                    <p class="secondary__text">من خلال هذ الاستشارة تقدر أن تعرف كل التفاصيل</p>
                    <a href="{{ url("https://api.whatsapp.com/send?phone=+201154450672&text=$message") }}" target="_blank" class="btn"> <span>&rarr;</span> احجز الاستشارة الان </a>
                </div>
                <div class="telephone__image wow slideInRight " data-wow-duration="1.5s" data-wow-delay="0.5s">
                    <img src="{{ url('imgs/zmzm-telephone.jpg') }}" alt="zmzm-telephone">
                </div>
            </div>
        </div>
    </section>
