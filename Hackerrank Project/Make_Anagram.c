#include <assert.h>
#include <limits.h>
#include <math.h>
#include <stdbool.h>
#include <stddef.h>
#include <stdint.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char* readline();

// Complete the makeAnagram function below.
int makeAnagram(char* a, char* b) {
	//inisiasi variabel jumlahA dan jumlahB untuk menyimpan jumlah huruf dari string a dan b
    int jumlahA[26];
    int jumlahB[26];
    //inisasi variabel hilangkan untuk menyimpan jumlah huruf yang harus dihilangkan untuk membentuk anagaram
	int hilangkan = 0;
	
	//inisiasi nilai jumlahA dan jumlahB
    for(int i = 0; i < 26; i++){
        jumlahA[i] = 0;
        jumlahB[i] = 0;
    }

	//menghitung jumlah karakter dari string a dan string b
    for(int i = 0; i < strlen(a); i++){
        jumlahA[a[i] - 'a']++;
    }
    for(int i = 0; i < strlen(b); i++){
        jumlahB[b[i] - 'a']++;
    }
	
	//menghitung jumlah hufur yang berbeda dari string a dan string b
    for(int i = 0; i < 26; i++){
        hilangkan = hilangkan + abs(jumlahB[i] - jumlahA[i]);
    }
    return hilangkan;
}

int main()
{
    FILE* fptr = fopen(getenv("OUTPUT_PATH"), "w");

    char* a = readline();

    char* b = readline();

    int res = makeAnagram(a, b);

    fprintf(fptr, "%d\n", res);

    fclose(fptr);

    return 0;
}

char* readline() {
    size_t alloc_length = 1024;
    size_t data_length = 0;
    char* data = malloc(alloc_length);

    while (true) {
        char* cursor = data + data_length;
        char* line = fgets(cursor, alloc_length - data_length, stdin);

        if (!line) {
            break;
        }

        data_length += strlen(cursor);

        if (data_length < alloc_length - 1 || data[data_length - 1] == '\n') {
            break;
        }

        alloc_length <<= 1;

        data = realloc(data, alloc_length);

        if (!line) {
            break;
        }
    }

    if (data[data_length - 1] == '\n') {
        data[data_length - 1] = '\0';

        data = realloc(data, data_length);
    } else {
        data = realloc(data, data_length + 1);

        data[data_length] = '\0';
    }

    return data;
}
