#version 330 compatibility

uniform float	uTime; // "Time", from Animate( )
uniform float uS0;
uniform float uT0;
uniform float uF1;
uniform float uF2;
uniform float uSize;

in vec2  	vST;		// texture coords

void
main( )
{
	vec3 myColor = vec3(0, 0, 1 );
	if(uF1 != 1){
//Running the animation
		if(((uT0-uSize <= vST.t + uTime && vST.t + uTime <= uT0+uSize) || (uT0-uSize <= vST.t - uTime && vST.t - uTime <= uT0+uSize))){
			myColor = vec3( uF2, 2*uF2, 2*uF1);
		}
	} else if((uT0-uSize <= vST.t && vST.t <= uT0+uSize) || (uT0-uSize <= vST.t && vST.t <= uT0+uSize)) 
//Frozen
	{ myColor = vec3( uF2, 2*uF2, 2*uF1); }
	gl_FragColor = vec4( myColor,  1. );
}
