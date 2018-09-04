#include<stdio.h>
#include<stdlib.h>
#include<malloc.h>
#include<conio.h>
 
struct Node 
{
  int data;
  struct Node *next;
};
struct Node *new_node = NULL, *last = NULL, *head = NULL;

void printList(struct Node *n)
{
  while (n != NULL)
  {
     printf(" %d ", n->data);
     n = n->next;
  }
}

void push(struct Node** head_ref, int new_data)
{
    new_node = (struct Node*) malloc(sizeof(struct Node));
  
    new_node->data  = new_data;
  
    new_node->next = (*head_ref);

    (*head_ref)    = new_node;
    new_node = NULL;
}

void append(struct Node** head_ref, int new_data)
{
    new_node = (struct Node*) malloc(sizeof(struct Node));
 
    last = *head_ref;  
    new_node->data  = new_data;
    new_node->next = NULL;
    if (*head_ref == NULL)
    {
       *head_ref = new_node;
       return;
    }
    while (last->next != NULL)
        last = last->next;

    last->next = new_node;
    new_node = NULL;
    last = NULL;
    return;
}

void insertAfter(struct Node* prev_node, int new_data)
{
    if (prev_node == NULL)
    {
      printf("the given previous node cannot be NULL");
      return;
    }
    new_node =(struct Node*) malloc(sizeof(struct Node));
    new_node->data  = new_data;
 
    new_node->next = prev_node->next;
 
    prev_node->next = new_node;
    new_node = NULL;
} 

int main()
{

	clrscr();
  append(&head, 6);
  push(&head, 7);
  push(&head, 1);
  append(&head, 4);
  insertAfter(head->next, 8);
 
  printf("\n Created Linked list is: ");
  printList(head);
 	getch();
  return 0;
}

