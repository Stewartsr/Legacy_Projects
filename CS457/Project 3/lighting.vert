#version 330 compatibility

uniform float uLightX;
uniform float uLightY;
uniform float uLightZ;

uniform float uk;
uniform float uP;

flat out vec3 Nf;
     out vec3 Ns;
flat out vec3 Lf;
     out vec3 Ls;
flat out vec3 Ef;
     out vec3 Es;
	 
	 out vec3 vMCposition;
	 out vec3 tan;
	 
	const float Y0 = 1;
	const float PI = 3.14;

vec3 eyeLightPosition = vec3( uLightX, uLightY, uLightZ );

void
main( )
{ 
	
	vMCposition = gl_Vertex.xyz;
	vec4 GL_vertex = gl_Vertex;

	vec4 ECposition = gl_ModelViewMatrix * gl_Vertex;
	float y = GL_vertex.y; 
	float x = GL_vertex.x;
	
	//displacment maping
	GL_vertex.z = uk * (Y0-y) * sin( 2.*PI*x/uP );
	
	float dzdx = uk * (Y0-y) * (2.*PI/uP) * cos( 2.*PI*x/uP ) ;
	float dzdy = -uk * sin( 2.*PI*x/uP );
	
	vec3 Tx = vec3(1., 0., dzdx );
	vec3 Ty = vec3(0., 1., dzdy );

	vec3 tan = normalize( cross(Tx, Ty) );	
	
	Nf = tan;	// surface normal vector
	Ns = Nf;

	Lf = eyeLightPosition - ECposition.xyz;		// vector from the point
									// to the light position
	Ls = Lf;
	Ef = vec3( 0., 0., 0. ) - ECposition.xyz;		// vector from the point
									// to the eye position 
	Es = Ef;

	gl_Position = gl_ModelViewProjectionMatrix * GL_vertex;
}
