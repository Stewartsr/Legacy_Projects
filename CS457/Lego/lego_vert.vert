#version 330 compatibility
//Pass a vNormal to geom.

out vec3 vNormal;

void
main( )
{
	vNormal = gl_Normal;
	gl_Position = gl_Vertex; 
}
