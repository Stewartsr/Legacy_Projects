#version 330 compatibility


uniform float	uTime; // "Time", from Animate( )
uniform float uS0;
uniform float uT0;
uniform float uV1;
uniform float uV2;
uniform float uSize;

out vec2  	vST;		// texture coords

const float PI = 	3.14159265;
const float AMP = 	0.2;		// amplitude
const float W = 	2.;		// frequency

void
main( )
{ 
	vST = gl_MultiTexCoord0.st;
	vec3 vert = gl_Vertex.xyz;
	if(uV1 != 1){
//running the animation
		if(((uT0-uSize <= vST.t + uTime && vST.t + uTime <= uT0+uSize) || (uT0-uSize <= vST.t - uTime && vST.t - uTime <= uT0+uSize)) ){
		vert.x = gl_Vertex.x; //??? something fun of your own design
		vert.y = gl_Vertex.y + .5+vST.t; //??? something fun of your own design
		vert.z = gl_Vertex.z; //??? something fun of your own design	
		} else{	
		vert.x = gl_Vertex.x; 
		vert.y = gl_Vertex.y; 
		vert.z = gl_Vertex.z; 
		}
//frozen
	} else if (((uT0-uSize <= vST.t && vST.t <= uT0+uSize) || (uT0-uSize <= vST.t && vST.t <= uT0+uSize))){
		vert.x = gl_Vertex.x; 
		vert.y = gl_Vertex.y + .5+vST.t; 
		vert.z = gl_Vertex.z; 
	}

	gl_Position = gl_ModelViewProjectionMatrix * vec4( vert, 1. );
}
