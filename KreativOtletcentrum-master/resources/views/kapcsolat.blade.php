@extends('layouts.layout')
@section('title', 'Kapcsolat')
@section('content')
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
      <div class="text-center">
        <h3 class="text-uppercase"><b>Kérdésed van? Írj nekünk!</b></h3>
      </div>
      <form id="contactForm" name="sentMessage" novalidate="novalidate" action="mailto:domokosdavid4@gmail.com" method="POST">
        <div class="row align-items-stretch mb-5">
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" id="name" name="Name" type="text" placeholder="Név *" required="required" data-validation-required-message="Kérem adja meg a nevét." />
              <p class="help-block text-danger"></p>
            </div>
            <div class="form-group">
              <input class="form-control" id="email" name="Email" type="email" placeholder="E-mail *" required="required" data-validation-required-message="Kérem adja meg az e-mail címét." />
              <p class="help-block text-danger"></p>
            </div>
            <div class="form-group mb-md-0">
              <input class="form-control" id="phone" type="tel" name="Phone" placeholder="Telefon *" required="required" data-validation-required-message="Kérem adja meg a telefonszámát." />
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group form-group-textarea mb-md-0">
              <textarea class="form-control" id="message" name="Message" placeholder="Üzenet *" required="required" data-validation-required-message="Kérem írja be üzenetét."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="text-center">
          <div id="success"></div>
          <button class="btn btn-xl text-uppercase" id="sendMessageButton" type="submit">Küldés</button>
        </div>
      </form>
    </div>
  </section>

  <div class="container" id="elerhetoseg">
    <div class="row">

      <div class="col-lg-6">
        <h2><b>Elérhetőségeink</b></h2>
        <p><b>Email:</b> kocentrum@info.hu</p>
        <p><b>Telefonszám:</b> +36301234567</p>
        <p><b>Cím:</b> 2230 Gyömrő, Gyömrői Út 123</p>
      </div>
      <div class="col-lg-6">
        <iframe id="terkep" class="rounded border-gray-600 shadow-lg focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9081.089942961125!2d19.397610731155908!3d47.41537022726169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741be50def15e91%3A0x400c4290c1e29d0!2zR3nDtm1yxZEsIDIyMzA!5e0!3m2!1shu!2shu!4v1645550595304!5m2!1shu!2shu" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>

  </div>
@endsection