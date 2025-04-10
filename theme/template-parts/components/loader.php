<style>
.loader {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  border: 3px solid;
  border-color: #FFF #FFF transparent;
  box-sizing: border-box;
  animation: rotation 2s linear infinite;
}
.loader::after {
  content: '';
  box-sizing: border-box;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  border: 3px solid;
  border-color: transparent var(--wp--preset--color--primary) var(--wp--preset--color--primary);
  width: 30px;
  height: 30px;
  border-radius: 50%;
  animation: rotationBack 1.5s linear infinite;
  transform-origin: center center;
}

@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes rotationBack {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-360deg);
  }

}


	.loader-overlay{
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background-image: url('http://se7enconstruction.test/wp-content/uploads/2025/04/loader-alt.jpg');
		background-size: cover;
		background-position:center;
		z-index: 5;
	}

	.loader-overlay::before{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0,0,0, .6);
			content: '';
			backdrop-filter: blur(10px);
		}

	.loader-inner{
		position: absolute;
		width: 100%;
		display: block;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		text-align:center;
	}

	.loading {
  font-size: 3rem;
  font-weight: 800;
  text-align: center;
  margin-top: 2rem;
  font-family: var(--wp--preset--font-family--silver-edition);
  font-style:italic;
}

.loading span{
    display: inline-block;
    margin: 0 -.05em;
	color: #fff;
}

.loading02 span {
	 animation: loading02 1.2s infinite alternate;
}
 .loading02 span:nth-child(2) {
	 animation-delay: 0.2s;
}
 .loading02 span:nth-child(3) {
	 animation-delay: 0.4s;
}
 .loading02 span:nth-child(4) {
	 animation-delay: 0.6s;
}
 .loading02 span:nth-child(5) {
	 animation-delay: 0.8s;
}
 .loading02 span:nth-child(6) {
	 animation-delay: 1s;
}
 .loading02 span:nth-child(7) {
	 animation-delay: 1.2s;
}

@keyframes loading02 {
  0% {
    filter: blur(0);
    opacity: 1;
  }
  100% {
    filter: blur(5px);
    opacity: .2;
  }
}

</style>

<div class="loader-overlay">
	<div class="loader-inner">
		<span class="loader"></span>

		<div class="loading loading02">
			<span data-text="L">L</span>
			<span data-text="o">o</span>
			<span data-text="a">a</span>
			<span data-text="d">d</span>
			<span data-text="i">i</span>
			<span data-text="n">n</span>
			<span data-text="g">g</span>
		</div>
	</div>
</div>
