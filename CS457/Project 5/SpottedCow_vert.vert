#version 330 compatibility

out vec4 vColor;
out float vLightIntensity;
out vec2 vST;
out vec3 MCposition;
out vec3 vReflectVector;
out vec3 vRefractVector;

uniform float uEta;


const vec3 LIGHTPOS = vec3( 0., 0., 10. );

void
main( )
{
	
	vec3 ECposition = vec3( gl_ModelViewMatrix * gl_Vertex );
	
	vec3 eyeDir = normalize( ECposition );			// vector from eye to pt
    vec3 normal = normalize( gl_NormalMatrix * gl_Normal );

	vReflectVector = reflect( eyeDir, normal );
	vRefractVector = refract( eyeDir, normal, uEta );
	
	vec3 LightPos = vec3( 5., 10., 10. );
    	vLightIntensity  = 1.5 * abs( dot( normalize(LightPos - ECposition), normal ) );
	if( vLightIntensity < 0.2 )
		vLightIntensity = 0.2;
	
	vec3 tnorm = normalize( gl_NormalMatrix * gl_Normal );
	
	
	vColor = gl_Color;
	vec3 MCposition = gl_Vertex.xyz;

	vST = gl_MultiTexCoord0.st;
	
	gl_Position = gl_ModelViewProjectionMatrix * gl_Vertex;
}