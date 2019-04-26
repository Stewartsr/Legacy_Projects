#include "linkedListQueue.h"
#include "assert.h"
#include <stdlib.h>



struct Link {
	TYPE          val;
	struct Link *next;
};


/* Singly Linked List with Head and Tail */
struct ListQueue {
   struct Link *head;
   struct Link *tail;
};



/* List queue with a sentinel at the front */

void initListQueue (struct ListQueue *q) {
   assert(q);
   struct Link *frontSentinel = malloc(sizeof(struct Link));
   frontSentinel->next = 0;
   q->head = frontSentinel;
   q->tail = frontSentinel;

}




struct ListQueue *createListQueue()
{
	struct ListQueue *newList = malloc(sizeof(struct ListQueue));
	initListQueue(newList);
	return newList;
}

void _freeListQueue(struct ListQueue *l) {
  while (!isEmptyListQueue(l))
  {
     removeFrontListQueue(l);
  }
}

void deleteListQueue(struct ListQueue *l)
{
	_freeListQueue(l);
	free(l);
	l = 0;
}



void addBackListQueue (struct ListQueue *q, TYPE e) {
   struct Link *newLink = malloc(sizeof(struct Link));
   newLink->val = e;
   newLink->next = NULL;

   q->tail->next = newLink;
   q->tail = newLink;

}


TYPE frontListQueue (struct ListQueue *q) {	
     return (q->head->next->val);   
}


void removeFrontListQueue (struct ListQueue *q) {
     if(q->head->next->next != 0){
	q->head->next = q->head->next->next;	
     }
}

int isEmptyListQueue (struct ListQueue *q) {
	if(q->head->next == NULL){
	return 1;
	}
	return 0;
}

