@extends('layouts.mainlayout')

@section('contenido')

  <div class="hero-section hero-style-2">
    @include('index.index')
  </div>
  <!-- ========================= feature style-2 start ========================= -->
  <section id="services" class="feature-section feature-style-2">
    @include('index.service')
  </section>
  <!-- ========================= feature style-2 end ========================= -->

  <!-- ========================= about style-3 start ========================= -->
  <section id="about" class="about-section about-style-3">
    @include('index.about')
  </section>
  <!-- ========================= about style-3 end ========================= -->


  <!-- ========================= team style-1 start ========================= -->
  <section id="team" class="team-section team-style-1">
    @include('index.team')
  </section>
  <!-- ========================= team style-1 end ========================= -->


  <!-- ========================= contact style-6 start ========================= -->
  <section id="contact" class="contact-section contact-style-6">
    @include('index.contact')
  </section>
  <!-- ========================= contact style-6 end ========================= -->

  <!-- ========================= footer style-1 start ========================= -->
  <footer class="footer footer-style-1">
    @include('index.footer')
  </footer>
  <!-- ========================= footer style-1 end ========================= -->
@endsection