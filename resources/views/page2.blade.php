@extends('layout.master')
@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/photo.css') }}"> --}}
@endsection
@section('css')
    <style>
        .wrapper {
            width: 800px;
            margin: 0 auto;
        }

        section {
            padding: 20px;
            margin-bottom: 40px;
            background-color: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        }
        /*------------------------------------*\
    MATERIAL PHOTO GALLERY
\*------------------------------------*/
.m-p-g {
  max-width: 100%;
  margin: 0 auto;
}
.m-p-g__thumbs-img {
  margin: 0;
  float: left;
  vertical-align: bottom;
  cursor: pointer;
  z-index: 1;
  position: relative;
  opacity: 0;
  filter: brightness(100%);
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  will-change: opacity, transform;
  transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
.m-p-g__thumbs-img.active {
  z-index: 50;
}
.m-p-g__thumbs-img.layout-completed {
  opacity: 1;
}
.m-p-g__thumbs-img.hide {
  opacity: 0;
}
.m-p-g__thumbs-img:hover {
  filter: brightness(110%);
}
.m-p-g__fullscreen {
  position: fixed;
  z-index: 10;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100vh;
  background: rgba(0, 0, 0, 0);
  visibility: hidden;
  transition: background 0.25s ease-out, visibility 0.01s 0.5s linear;
  will-change: background, visibility;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}
.m-p-g__fullscreen.active {
  transition: background 0.25s ease-out, visibility 0.01s 0s linear;
  visibility: visible;
  background: rgba(0, 0, 0, 0.95);
}
.m-p-g__fullscreen-img {
  pointer-events: none;
  position: absolute;
  transform-origin: left top;
  top: 50%;
  left: 50%;
  max-height: 100vh;
  max-width: 100%;
  visibility: hidden;
  will-change: visibility;
  transition: opacity 0.5s ease-out;
}
.m-p-g__fullscreen-img.active {
  visibility: visible;
  opacity: 1 !important;
  transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.5s ease-out;
}
.m-p-g__fullscreen-img.almost-active {
  opacity: 0;
  transform: translate3d(0, 0, 0) !important;
}
.m-p-g__controls {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 200;
  height: 20vh;
  background: linear-gradient(to top, transparent 0%, rgba(0, 0, 0, 0.55) 100%);
  opacity: 0;
  visibility: hidden;
  transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
.m-p-g__controls.active {
  opacity: 1;
  visibility: visible;
}
.m-p-g__controls-close, .m-p-g__controls-arrow {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border: none;
  background: none;
}
.m-p-g__controls-close:focus, .m-p-g__controls-arrow:focus {
  outline: none;
}
.m-p-g__controls-arrow {
  position: absolute;
  z-index: 1;
  top: 0;
  width: 20%;
  height: 100vh;
  display: flex;
  align-items: center;
  cursor: pointer;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  opacity: 0;
}
.m-p-g__controls-arrow:hover {
  opacity: 1;
}
.m-p-g__controls-arrow--prev {
  left: 0;
  padding-left: 3vw;
  justify-content: flex-start;
}
.m-p-g__controls-arrow--next {
  right: 0;
  padding-right: 3vw;
  justify-content: flex-end;
}
.m-p-g__controls-close {
  position: absolute;
  top: 3vh;
  left: 3vw;
  z-index: 5;
  cursor: pointer;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
.m-p-g__btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.07);
  transition: all 0.25s ease-out;
}
.m-p-g__btn:hover {
  background: rgba(255, 255, 255, 0.15);
}
.m-p-g__alertBox {
  position: fixed;
  z-index: 999;
  max-width: 700px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: white;
  padding: 25px;
  border-radius: 3px;
  text-align: center;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.23), 0 10px 40px rgba(0, 0, 0, 0.19);
  color: grey;
}
.m-p-g__alertBox h2 {
  color: red;
}

/* DEMO */
body {
  background: #fefefe;
  color: white;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  font-family: "Roboto Mono";
}

h2 {
  font-weight: 300;
  margin: 4vh 4vw;
  letter-spacing: 3px;
  color: grey;
  text-transform: uppercase;
}

.demo-btn {
  display: inline-block;
  margin: 0 2.5px 4vh 2.5px;
  text-decoration: none;
  color: grey;
  padding: 15px;
  line-height: 1;
  min-width: 140px;
  background: rgba(0, 0, 0, 0.07);
  border-radius: 6px;
}

.demo-btn:hover {
  background: rgba(0, 0, 0, 0.12);
}

@media (max-width: 640px) {
  .demo-btn {
    min-width: 0;
    font-size: 14px;
  }
}
    </style>
@endsection
@section('content')

            <div class="m-p-g">
	<div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
		<img src="http://unsplash.it/600/400?image=940" data-full="http://unsplash.it/1200/800?image=940" class="m-p-g__thumbs-img" />
		<img src="http://unsplash.it/640/450?image=906" data-full="http://unsplash.it/1280/900?image=906" class="m-p-g__thumbs-img" />
		<img src="http://unsplash.it/550/420?image=885" data-full="http://unsplash.it/1100/840?image=885" class="m-p-g__thumbs-img" />
		<img src="http://unsplash.it/650/450?image=823" data-full="http://unsplash.it/1300/900?image=823" class="m-p-g__thumbs-img" />
		<img src="http://unsplash.it/600/350?image=815" data-full="http://unsplash.it/1200/700?image=815" class="m-p-g__thumbs-img" />
		<img src="http://unsplash.it/560/500?image=677" data-full="http://unsplash.it/1120/1000?image=677" class="m-p-g__thumbs-img" />
		<img src="http://unsplash.it/670/410?image=401" data-full="http://unsplash.it/1340/820?image=401" class="m-p-g__thumbs-img" />
		<img src="http://unsplash.it/620/340?image=623" data-full="http://unsplash.it/1240/680?image=623" class="m-p-g__thumbs-img" />
		<img src="http://unsplash.it/790/390?image=339" data-full="http://unsplash.it/1580/780?image=339" class="m-p-g__thumbs-img" />
	</div>

	<div class="m-p-g__fullscreen"></div>
</div>

@endsection
@section('js')
    <script>
        var elem = document.querySelector('.m-p-g');

        document.addEventListener('DOMContentLoaded', function() {
            var gallery = new MaterialPhotoGallery(elem);
        });
    </script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/material-photo-gallery.min.js'></script>
@endsection
