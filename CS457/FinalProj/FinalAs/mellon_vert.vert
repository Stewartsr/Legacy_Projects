#version 330 compatibility

uniform float uLightX, uLightY, uLightZ;

out vec4  vColor;
out float vLightIntensity;
out vec2  vST;
out vec3 vNs;
out vec3 vLs;
out vec3 vEs;

vec3 eyeLightPosition = vec3( uLightX, uLightY, uLightZ );

uniform float uMorph;


const vec3 LIGHTPOS = vec3( 0., 0., 10. );
const float PI = 3.14159265;
const float SIDE = 2.;


void
main( )
{
	
	//morph the mellon
	vec4 vertex0 = gl_Vertex;
	vertex0.xyz *= 4./length(vertex0.xyz);
	vertex0.xyz = clamp( vertex0.xyz, -SIDE, SIDE );

    vec3 tnorm      = normalize( vec3( gl_NormalMatrix * gl_Normal ) );
	vec3 ECposition = vec3( gl_ModelViewMatrix * gl_Vertex );
    vLightIntensity  = abs( dot( normalize(LIGHTPOS - ECposition), tnorm ) );
	
	if( vLightIntensity < 0.2 )
		vLightIntensity = 0.2;
		
	vColor = gl_Color;

	float t = uMorph;

	gl_Position = gl_ModelViewProjectionMatrix * mix( gl_Vertex, vertex0, t );
	vST = gl_MultiTexCoord0.st;

	//lighting
	vNs = normalize( gl_NormalMatrix * gl_Normal );	// surface normal vector
	vLs = eyeLightPosition - ECposition.xyz;		// vector from the point
	vEs = vec3( 0., 0., 0. ) - ECposition.xyz;		// vector from the point

}
