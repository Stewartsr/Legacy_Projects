#include "linkedList.h"
#include <stdlib.h>
#include <stdio.h>


struct Link* listInsertionSort(struct Link* head) {

  /*
   * This function performs an insertion sort on the list whose head is
   * provided as the function's argument, so that the values in the list are
   * sorted in ascending order, starting at the head.
   * Returns a pointer to the new head of the list.
   */
   struct Link *temp1 = head->next;
      while(temp1 != NULL){
	struct Link* temp2 = head;
	int data = temp1->value;
        int check = 0; 
	while(temp2 != temp1){
	   if(temp2->value > temp1->value && check == 0){
		data = temp2->value;
		temp2->value = temp1->value;
		check = 1;
		temp2 = temp2->next;
	   }	
	   else {
		if (check == 1){
		     int tempData = data;
		     data = temp2->value;
		     temp2->value = tempData;	 
		}
		temp2 = temp2->next;
	   }
	}
	temp2->value = data;
	temp1 = temp1->next;
      }
return head;

}


struct Link* reverseList(struct Link* head) {

  /*
   * This function iteratively reverses the list whose head is provided
   * as the function's argument.
   * Returns a pointer to the new head of the list.
   */
  struct Link* prev = NULL;
  struct Link* cur = head;
  struct Link* next;
  while(cur){
     next = cur->next;
     cur->next = prev;
     prev = cur;
     cur = next;    
  } 
  head = prev; 
  return head;

}

