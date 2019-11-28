import random

latitude = []
longitude = []
itemCoordinates = []
ts = ["'2015-04-23 15:10:11'", "'2015-04-23 17:10:11'", "'2016-04-23 13:10:11'", "'2016-04-23 14:10:11'", "'2016-04-23 16:10:11'", "'2016-04-23 18:10:11'", "'2017-04-23 13:10:11'", "'2017-04-23 14:10:11'", "'2017-04-23 15:10:11'", "'2017-04-23 16:10:11'", "'2017-04-23 17:10:11'", "'2017-04-23 18:10:11'", "'2017-07-23 13:10:11'", "'2017-07-23 14:10:11'", "'2017-07-23 15:10:11'", "'2017-07-23 16:10:11'", "'2017-07-23 17:10:11'", "'2017-07-23 18:10:11'", "'2018-04-23 13:10:11'", "'2018-04-23 14:10:11'", "'2018-04-23 15:10:11'", "'2018-04-23 16:10:11'", "'2018-04-23 17:10:11'", "'2018-04-23 18:10:11'", "'2018-07-23 13:10:11'", "'2018-07-23 14:10:11'", "'2018-07-23 15:10:11'", "'2018-07-23 16:10:11'", "'2018-07-23 17:10:11'", "'2018-07-23 18:10:11'", "'2018-08-23 13:10:11'", "'2018-08-23 14:10:11'", "'2018-08-23 15:10:11'", "'2018-08-23 16:10:11'", "'2018-08-23 17:10:11'", "'2018-08-23 18:10:11'"]



for i in range(15):
    latitude.append(random.uniform(-90, 90))
    longitude.append(random.uniform(0, 180))
    print("Insert Into local_publico values (" + str(latitude[i]) + ", " + str(longitude[i]) + ", " + "'city" +str(i) + "');\n")
    

for i in range(30):
    j = random.randrange(0,15,1)
    print("Insert Into item (descricao, localizacao, latitude, longitude) values ( 'descricao" + str(i) + "', 'localizacao" + str(i) + "', " + str(latitude[j]) + ", " + str(longitude[j]) +");\n")
    itemCoordinates.append([latitude[j],longitude[j]])

for i in range(30):
    tem_anomalia_redacao = random.choice([True, False])
    print("Insert Into anomalia (zona, imagem, lingua, ts, descricao, tem_anomalia_redacao) values ( 'zona_" + str(i) + "', 'imagem" + str(i) + "', 'lingua_" + str(i) + "', " + ts[random.randrange(0,36,1)] + ", 'descricao" + str(i) + "', " + str(tem_anomalia_redacao)  +");\n")
    if not (tem_anomalia_redacao):
        print("Insert Into anomalia_traducao (zona2, lingua2) values ( 'zona2_" + str(i) + "', 'lingua2_" + str(i) + "');\n")

for i in range(30):
    for j in range(i+1, 30):
        if itemCoordinates[i] == itemCoordinates[j]:
            print("Insert Into duplicado values (" + str(i) + ", " + str(j) + ");\n")
utilizadores_qualificados = []
for i in range(30):
    print("Insert Into utilizador values ( 'email" + str(i) + "@bd.com', 'password" + str(i) + "');\n")
    qualificado = random.randrange(0, 100, 1)
    if qualificado < 30:
        print("Insert Into utilizador_qualificado values ( 'email" + str(i) + "@bd.com');\n")
        utilizadores_qualificados.append(i)
    else:
        print("Insert Into utilizador_regular values ( 'email" + str(i) + "@bd.com');\n")

for i in range(30):
    print("Insert Into incidencia values (" + str(i) + ", " + str(random.randrange(0,30,1)) + ", 'email" + str(random.randrange(0,30,1)) + "@bd.com');\n")

for i in range(30):
    u = random.choice(utilizadores_qualificados)
    print("Insert Into proposta_de_correcao values ('email" + str(u) + "@bd.com', " + str(i) + ", " +  ts[random.randrange(0,36,1)] + ", 'texto" + str(i) + "');\n")
    print("Insert Into correcao values ('email" + str(u) + "@bd.com', " + str(i) + ", " + str(random.randrange(0,30,1)) + ");\n")







