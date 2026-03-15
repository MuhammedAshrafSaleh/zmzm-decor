
  <!--==========================================================================-
        Footer Section
    --==========================================================================-->
  <footer class="footer">
      <div class="footer__body">
          <ul class="footer__list">
              @php
                  $reversedNav = $navlist->reverse();
              @endphp
              @foreach ($reversedNav as $navItem)
                  <li class="footer__item">
                      <a href=" {{ route('home') }}{{$navItem->url}}" class="footer__link secondary__text footer__nav">
                          {{ $navItem->name }}
                      </a>
                  </li>
              @endforeach
          </ul>

          <ul class="footer__list">
              @foreach ($footerContacts as $contact)
                  <li class="footer__item">
                      <p class="secondary__text"> {{ $contact->contact }} </p>
                      <a href="{{ $contact->url }}" class="footer__link" target="_blank">
                          <img src="{{ url('imgs/footer/' . $contact->image) }}" alt="zmzm location"
                              class="footer__img">
                      </a>
                  </li>
              @endforeach
          </ul>

          <ul class="footer__list">
              <li class="footer__item">
                  <a href="{{ url('/') }}" class="footer__link">
                      <img src="{{ url('imgs/logo.png') }}" alt="{{ $logo->name }}" id="footer__logo">
                  </a>
              </li>
              <li class="footer__item">
                  <a href="https://wa.me/{{$whatsapp->phone}}" class="btn btn-bg" target="_blank"> {{ $logo->button }} </a>
              </li>
          </ul>
      </div>
      <hr class="footer__hr">
      <div class="footer__copyrights">
          <ul class="footer__social">
              @foreach ($footerSocial as $footerItem)
                  <li class="footer__item">
                      <a href="{{ $footerItem->url }}" class="footer__link" target="_blank">
                          <img src="{{ url('imgs/footer/' . $footerItem->image) }}" alt="{{ $footerItem->name }}"
                              class="footer__img">
                      </a>
                  </li>
              @endforeach
          </ul>
          <p class="secondary__text">كل الحقوق محفوظة الي شركة <span>{{ $logo->name }}</span> <span
                  style="color:#FFF" id="date"></span></p>
      </div>
  </footer>

  <script>
      let date = document.getElementById('date');
      let currentDate = new Date();
      let year = currentDate.getFullYear();
      date.textContent = year;
  </script>
