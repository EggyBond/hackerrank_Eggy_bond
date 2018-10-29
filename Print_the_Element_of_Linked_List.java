    // Complete the printLinkedList function below.

    /*
     * For your reference:
     *
     * SinglyLinkedListNode {
     *     int data;
     *     SinglyLinkedListNode next;
     * }
     *
     */
    static void printLinkedList(SinglyLinkedListNode head) {
        SinglyLinkedListNode nodetemp = head;
        while (nodetemp != null) {
            System.out.println(nodetemp.data);
            nodetemp = nodetemp.next;
        }   
    }