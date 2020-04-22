@extends('base.master')
@section('title', 'A propos')

@section('navbar')
    @parent
@endsection

@section('content')
    <!-- Services -->
        <div class="container" style="text-align: center; font-size: larger">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">a propos</h2>
                    <h3 class="section-subheading text-muted">Quelques explications sur cette application web.</h3>
                </div>
            </div>
            <div class="row text-center" style="margin-top: 50px; margin-bottom: 50px;">
                <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-secondary"></i>
              <i class="fas fa-gamepad fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading">Les Jeux</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-secondary"></i>
            <i class="fas fa-comment fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading">Les Commentaires</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-secondary"></i>
              <i class="fas fa-tag fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading">Les Tags</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
            </div>
        </div>
@endsection
