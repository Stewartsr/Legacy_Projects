#version 330 compatibility

uniform float uAd;
uniform float uBd;
uniform float uNoiseAmp;
uniform float uNoiseFreq; 
uniform float uAlpha;

in float vLightIntensity; 
in vec3  vReflectVector;
uniform samplerCube ReflectUnit;

uniform sampler2D Noise2;
in vec3  vRefractVector;
uniform float uMix;
uniform samplerCube RefractUnit;

const vec4 WHITE = vec4( 1.,1.,1.,1. );

in vec4 vColor;
in vec2  vST;
in vec3 MCposition;

const vec4 RED = vec4( 1., 0., 0., 1. );

void
main( )

{

gl_FragColor = vColor;
	// read the glman noise texture and convert it to a range of [-1.,+1.]:
	vec4 nv  = texture2D( Noise2, uNoiseFreq*vST );
	float n = nv.r + nv.g + nv.b + nv.a;    //  1. -> 3.
	n = n - 2.;                             // -1. -> 1.

	
	
	//get the necessary values to create ellipses
	float s = vST.s;
	float t = vST.t;
	float Ar = uAd/2.;
	float Br = uBd/2.; 
	int numins = int( s / uAd );
	int numint = int( t / uBd );
	float sc =  (numins*uAd) + Ar;
	float tc =  (numint*uBd) + Br;
	float ds=(s - sc);  // /Br was here
	float dt=(t - tc); // /Ar was here
	float oldDist = sqrt((ds*ds)+(dt*dt)); 
	float newDist = (oldDist+uNoiseAmp*n);
	
	float scale = (newDist / oldDist);        // this could be < 1., = 1., or > 1.

	ds *= scale;                            // scale by noise factor
	ds /= Ar;                               
	dt *= scale;                            // scale by noise factor	
	dt /= Br;  
	

	
	float d = ds*ds + dt*dt;
	if(d<=1){ 
		vec4 newcolor = textureCube( ReflectUnit, vReflectVector );
		gl_FragColor = newcolor;
	}
	else{
		vec4 newcolor = textureCube( ReflectUnit, vReflectVector );
		gl_FragColor = newcolor;
		if (uAlpha==0){
			vec4 refractColor = textureCube( RefractUnit, vRefractVector );
			vec4 reflectColor = textureCube( ReflectUnit, vReflectVector );

			refractColor = mix( refractColor, WHITE, 0.40 );
			gl_FragColor = vec4(  mix( refractColor.rgb, reflectColor.rgb, uMix ), 1.  );
		}
	} 
	
	}
	
	