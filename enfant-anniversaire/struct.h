typedef struct tdate
{
    int jour;
    int mois;
    int annee;
}t_date;

typedef struct tenfant
{
    char nom[10];
    char prenom[10];
    t_date DateN;

}t_enfant;

typedef struct tEmploye
{
    char nom[10];
    char prenom[10];
    int Nbenf;
    t_enfant Tabprogeniture[10];
}t_Employe;
