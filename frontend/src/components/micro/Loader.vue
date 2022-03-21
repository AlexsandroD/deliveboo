<template>
    <div class="loader_container">
        <div class="ms_loader"></div>
    </div>
</template>

<script>
export default {
    name: 'Loader'
}
</script>

<style lang='scss' scoped>
@import "../../assets/style/_variables.scss";

$loader_p: 3.25em;
$loader_r: 1em;
$loader_b: 20*$loader_r;
$loader_d: 2*($loader_b - $loader_r);
$loader_c: $_primary, $_green;
$loader_n: length($loader_c);
$loader_q: 20%;
$loader_t: 1s;



.loader_container {
	display: grid;
	place-content: center;
	margin: 0;
	animation: fsx 4*$loader_t steps(1) infinite
}

@keyframes fsx { 50% { transform: scale(-1) } }

.ms_loader {
	overflow: hidden;
	position: relative;
	padding: $loader_p;
	border-radius: 1em;
	animation: 
		fbg 2*$loader_n*$loader_t steps(1) #{-$loader_t} infinite, 
		fsc 2*$loader_t steps(1) infinite;
	
	&::after {
		position: absolute;
		top: 50%; left: 50%;
		margin: -$loader_r (-.5*$loader_d - $loader_r);
		padding: $loader_b;
		transform-origin: 50% 0;
		animation: 
			fbg 2*$loader_n*$loader_t steps(1) -3*$loader_t infinite, 
			mov $loader_t infinite alternate,
			exp $loader_t ease-in infinite alternate;
		content: ''
	}
}

@keyframes fsc { 50% { transform: scaley(-1) } }

@keyframes fbg {
	@for $i from 0 to $loader_n {
		#{$i/$loader_n*100%} { background: nth($loader_c, $i + 1) }
	}
}

@keyframes mov {
	0%, #{$loader_q} { transform: none }
	100% { transform: translatey($loader_r) rotate(.5turn) }
}

@keyframes exp {
	0%, #{$loader_q} { clip-path: inset(0 .5*$loader_d $loader_d round 50%) }
	100% { clip-path: inset(0 round 50%/ 0) }
}

</style>