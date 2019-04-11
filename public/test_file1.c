#include<stdio.h>

int sum(int a, int b);

int main()
{
int t;
scanf("%d", &t);
while(t--){
   int a, b;
   scanf("%d %d", &a, &b);
    printf("%d\n", sum(a, b));
}
}int sum(int a, int b)
{
    return a + b; // return sum
}