Declare @i int
Set @i = 1

While i <= 100
Begin 
   Insert Into local_publico values (CAST(@i as nvarchar(10)), CAST(@i as nvarchar(10)), ' name' + CAST(@i as nvarchar(10)))
   Set @i = i + 1
End