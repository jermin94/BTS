#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include "struct.h"
#include "void.h"

int main()
{
    int nbe;
    t_Employe Tabenploye[5];

    printf("Saisir le nombre d'employe\n");
    scanf("%d", &nbe);
    //ctrl saisie nbe < 5

    saisi(Tabenploye,nbe);

    recherche(Tabenploye,nbe);

    return 0;
}
