#version 330 compatibility

uniform float uScenter;
uniform float uTcenter;
uniform float uDs;
uniform float uDt;
uniform float uMagFactor;
uniform float uSharpFactor;
uniform float uRotAngle;
uniform sampler2D uImageUnit;

varying vec2  vST;
varying vec4  vColor;
varying float vLightIntensity; 


void
main( )
{
		vec3 irgb = texture( uImageUnit, vST ).rgb;
		ivec2 ires = textureSize( uImageUnit, 0);
		float ResS = float( ires.s );
		float ResT = float( ires.t );
		if (uScenter-uDs <= vST.s  &&  vST.s <= uScenter+uDs  &&   uTcenter-uDt <= vST.t  &&  vST.t <= uTcenter+uDt){
			
			vec2 magVec = vST;
			float s = vST.s;
			float t = vST.t;
			
			/////Magnify it
			float sC = s - uScenter; 
			float tC = t - uTcenter; 
			s = sC/uMagFactor + uScenter;
			t = tC/uMagFactor + uTcenter;
			
			////Rotate it
			float tt = t * cos(uRotAngle) - s * sin(uRotAngle);
			float ss = t * sin(uRotAngle) + s * cos(uRotAngle);
			vec2 newST = vec2( ss, tt);
		
			/////Sharpen 
			vec3 irgb = texture( uImageUnit, newST ).rgb;
			
			vec2 stp0 = vec2(1./ResS, 0. );
			vec2 st0p = vec2(0. , 1./ResT);
			vec2 stpp = vec2(1./ResS, 1./ResT);
			vec2 stpm = vec2(1./ResS, -1./ResT);
			
			vec3 i00 = texture2D( uImageUnit, newST ).rgb;
			vec3 im1m1 = texture2D( uImageUnit, newST-stpp ).rgb;
			vec3 ip1p1 = texture2D( uImageUnit, newST+stpp ).rgb;
			vec3 im1p1 = texture2D( uImageUnit, newST-stpm ).rgb;
			vec3 ip1m1 = texture2D( uImageUnit, newST+stpm ).rgb;
			vec3 im10 = texture2D( uImageUnit, newST-stp0 ).rgb;
			vec3 ip10 = texture2D( uImageUnit, newST+stp0 ).rgb;
			vec3 i0m1 = texture2D( uImageUnit, newST-st0p ).rgb;
			vec3 i0p1 = texture2D( uImageUnit, newST+st0p ).rgb;
			
			vec3 target = vec3(0.,0.,0.);
			target += 1.*(im1m1+ip1m1+ip1p1+im1p1);
			target += 2.*(im10+ip10+i0m1+i0p1);
			target += 4.*(i00);
			target /= 16.;
			gl_FragColor= vec4( mix( target, irgb, uSharpFactor ), 1. );
			
		}
		else{
			gl_FragColor = vec4( irgb, 1. );

		}
		
}
