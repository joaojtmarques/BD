import random

latitude = []
longitude = []
itemCoordinates = []
ts = ["'2015-04-23 15:10:11'", "'2015-04-23 17:10:11'", "'2016-04-23 13:10:11'", "'2016-04-23 14:10:11'", "'2016-04-23 16:10:11'", "'2016-04-23 18:10:11'", "'2017-04-23 13:10:11'", "'2017-04-23 14:10:11'", "'2017-04-23 15:10:11'", "'2017-04-23 16:10:11'", "'2017-04-23 17:10:11'", "'2017-04-23 18:10:11'", "'2017-07-23 13:10:11'", "'2017-07-23 14:10:11'", "'2017-07-23 15:10:11'", "'2017-07-23 16:10:11'", "'2017-07-23 17:10:11'", "'2017-07-23 18:10:11'", "'2018-04-23 13:10:11'", "'2018-04-23 14:10:11'", "'2018-04-23 15:10:11'", "'2018-04-23 16:10:11'", "'2018-04-23 17:10:11'", "'2018-04-23 18:10:11'", "'2018-07-23 13:10:11'", "'2018-07-23 14:10:11'", "'2018-07-23 15:10:11'", "'2018-07-23', '16:10:11'", "'2018-07-23 17:10:11'", "'2018-07-23 18:10:11'", "'2018-08-23 13:10:11'", "'2018-08-23 14:10:11'", "'2018-08-23 15:10:11'", "'2018-08-23 16:10:11'", "'2018-08-23 17:10:11'", "'2018-08-23 18:10:11'"]



for i in range(15):
    latitude.append(random.uniform(-90, 90))
    longitude.append(random.uniform(0, 180))
    print("Insert Into local_publico values (" + str(latitude[i]) + ", " + str(longitude[i]) + ", " + "'city" +str(i) + "');\n")
    

for i in range(30):
    j = random.randrange(0,15,1)
    print("Insert Into item values (" + str(i) + ", 'descricao" + str(i) + "', 'localizacao" + str(i) + "', " + str(latitude[j]) + ", " + str(longitude[j]) +");\n")
    itemCoordinates.append([latitude[j],longitude[j]])

for i in range(30):
    tem_anomalia_redacao = str(random.randrange(0,2,1)) 
    print("Insert Into anomalia values (" + str(i) + ", 'zona_" + str(i) + "', 'imagem" + str(i) + "', 'lingua_" + str(i) + "', " + ts[random.randrange(0,36,1)] + ", 'descricao" + str(i) + "', " + tem_anomalia_redacao  +");\n")
    if(tem_anomalia_redacao):
        print("Insert Into anomalia_traducao values (" + str(i) + ", 'zona2_" + str(i) + "', 'lingua2_" + str(i) + "');\n")

for i in range(30):
    for j in range(i+1, 30):
        if itemCoordinates[i] == itemCoordinates[j]:
            print("Insert Into duplicados values (" + str(i) + ", " + str(j) + ");\n")

for i in range(30):
    print("Insert Into utilizador values ( 'email" + str(i) + "@bd.com', 'password" + str(i) + "');\n")
    qualificado = random.randrange(0, 100, 1)
    if qualificado < 30:
        print("Insert Into utilizador_qualificado values ( 'email" + str(i) + "@bd.com');\n")
    else:
        print("Insert Into utilizador_regular values ( 'email" + str(i) + "@bd.com');\n")

l= []
for i in range(30):
    print("Insert Into incidencia values (" + str(i) + ", " + str(random.randrange(0,30,1)) + ", 'email" + str(random.randrange(0,30,1)) + "@bd.com');\n")







