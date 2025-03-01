/*
  File: bst.h
  Interface definition of the binary search tree data structure.
*/

#ifndef __BST_H
#define __BST_H

/* Defines the type to be stored in the data structure.  These macros
 * are for convenience to avoid having to search and replace/dup code
 * when you want to build a structure of doubles as opposed to ints
 * for example.
 */

# ifndef TYPE
# define TYPE      int
# endif


struct BSTree;
/* Declared in the c source file to hide the structure members from the user. */

/* Initialize binary search tree structure. */
void initBSTree(struct BSTree *tree);

/* Alocate and initialize search tree structure. */
struct BSTree *newBSTree();

/* Deallocate nodes in BST. */
void clearBSTree(struct BSTree *tree);

/* Deallocate nodes in BST and deallocate the BST structure. */
void deleteBSTree(struct BSTree *tree);

/*-- BST Bag interface --*/
bool  isEmptyBSTree(struct BSTree *tree);
int     sizeBSTree(struct BSTree *tree);

void     addBSTree(struct BSTree *tree, TYPE val);
bool containsBSTree(struct BSTree *tree, TYPE val);
void  removeBSTree(struct BSTree *tree, TYPE val);
void printTree(struct BSTree *tree);
# endif
