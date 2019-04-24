#version 330 compatibility

in vec4  vColor;
in float vLightIntensity;
in vec2  vST;
in vec3 vNs;
in vec3 vLs;
in vec3 vEs;


uniform float uAmp;
uniform float uFreq;
uniform float uNumOfLines;
uniform float uTol;
uniform vec4  uLineColor;
uniform float uKa, uKd, uKs;
uniform vec4 uSpecularColor;
uniform float uShininess;

uniform sampler2D Noise2;

void
main( )
{

	gl_FragColor = vColor;		// default color					
	
	vec4 nv = texture2D( Noise2, uFreq*vST );  //SHOULD BE creating a usable noise value
	float n = nv.r + nv.g + nv.b + nv.a;    
	n = n - 2.;      
	
	float s = vST.s;
	float t = vST.t;
	float sp = 2. * s;		// good for spheres
	float tp = t;
	int numins = int( sp / uNumOfLines );
	int numint = int( tp / uNumOfLines );


//***************draw lines and add noise
	if( ( (numins) % 2 ) == 0 )
	{
		if( true )
		{
			float scenter = float(numins)*uNumOfLines;
			float tcenter = float(numint)*uNumOfLines;
			float ds = abs(sp - scenter);	
			float dt = abs(tp - tcenter);
			float maxDist = ds;
			float newDist = (maxDist+uAmp*n); //using the noise 
	
			float scale = (newDist / maxDist);  //using the noise 
			
			ds *= scale;                            // scale by noise factor
			dt *= scale;                            // scale by noise factor	
	
			float d = ds*ds + dt*dt;
			if(d<=1){ 
				float t = smoothstep( uNumOfLines-uTol, uNumOfLines+uTol, maxDist );
				gl_FragColor = mix( uLineColor, vColor, t );
			} 
			else {
				gl_FragColor = vColor;
			}
		}
	}
	
	///******for lighting 
	vec3 Normal = normalize(vNs);
	vec3 Light = normalize(vLs);
	vec3 Eye = normalize(vEs);
	
	vec4 ambient = uKa * gl_FragColor;
	float d = max( dot(Normal,Light), 0. );
	vec4 diffuse = uKd * d * gl_FragColor;

	float q = 0.;
	if( dot(Normal,Light) > 0. )		// only do specular if the light can see the point
	{
		// use the reflection-vector:
		vec3 ref = normalize( 2. * Normal * dot(Normal,Light) - Light );
		q = pow( max( dot(Eye,ref),0. ), uShininess );
	}
	vec4 specular = uKs * q * uSpecularColor;
	
	gl_FragColor = vec4( ambient.rgb + diffuse.rgb + specular.rgb, 1. );
	//***********end of lighting
	
	//gl_FragColor.rgb *= vLightIntensity;	// apply lighting model, old
}
