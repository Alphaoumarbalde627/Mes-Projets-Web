BOS = [2.67, 1.00, 1.21, 3.09, 3.43, 4.71, 3.88, 3.08, 4.10, 2.62, 1.01, 5.93]
MER = [6.83, 3.63, 7.20, 2.68, 2.05, 2.96, 1.04, 0.00, 0.03, 6.71, 8.28, 6.85]
MOIS = ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Descembre"]
cpt = 0
total_BOS = sum(BOS)
total_MER = sum(MER)
Moyenne_BOS = total_BOS / len(BOS)
Moyenn_MER = total_MER / len(MER)
Nb_Mois_BOS = sum(1 for value in BOS
                   if value > Moyenne_BOS)
Nb_Mois_MER = sum(1 for value in MER
                   if value > Moyenn_MER)
Nb_liste_mois_P_BOS_superieur_Seatle = sum(1 for bos, mer in zip(BOS,MER)
                                            if bos < mer)
"""Nb_Liste_Mois_P = [i+1 for i, (bos, mer) in enumerate(zip(BOS, MER))
                    if bos < mer]"""
print("Précipitation totales et moyennes mensuelles:")
print(f"Boston : Total = {total_BOS}, Moyenne = {Moyenne_BOS}")
print(f"Seattle : Total = {total_MER}, Moyenne = {Moyenn_MER}")
print("Nombre de mois avec précipitation supérieures à la moyenne")
print(f"Boston : {Nb_Mois_BOS} mois")
print(f"Seattle : {Nb_Mois_MER} mois")
print("Mois où les précipitation à Boston sont inférieures à celles de Seattle")
print(f"Nombre de mois : {Nb_liste_mois_P_BOS_superieur_Seatle}")
for i, j in zip(BOS,MER):
    if i<j:
        cpt+=1
        m = BOS.index(i)
        print(MOIS[m])
"""print(f"Mois Concernés : {Nb_Liste_Mois_P}")"""