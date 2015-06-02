PROGRAM InsertSort2(INPUT, OUTPUT);
USES SortToFile;
VAR
  ArrayForSort: ArraySort;
  CountWord, Index: INTEGER;
  Ch: CHAR;
  MaxAch: BOOLEAN;
  Inp, F1, FTemp, SortFile: TEXT;
  Word : STRING;

FUNCTION CheckLetter(Ch: CHAR): BOOLEAN; {функция проверки на принадлежность к кириллическим символам}
BEGIN {CheckLetter}
  CheckLetter := FALSE;
  IF ((Ch >= 'А') AND (Ch <= 'Я')) OR ((Ch >= 'а') AND (Ch <= 'я')) {OR ((Ch >= 'р') AND (Ch <= 'я')) }
  THEN 
    CheckLetter := TRUE
END; {CheckLetter}

FUNCTION Lower(Ch: CHAR): CHAR; {функция понижения регистра}
BEGIN
  IF ((ORD(Ch) >= 192) AND (ORD(Ch) <= 223))
  THEN
    Lower := CHR(ORD(Ch) + 32)
  ELSE
    Lower := Ch  
END;

FUNCTION LineCount(VAR F: TEXT): INTEGER; {функция подсчета количества непустых строк в файле}
VAR
  Count: INTEGER;
BEGIN
  RESET(F);
  Count := 0;
  WHILE NOT EOF(F)
  DO
    BEGIN
      READLN(F);
      Count := Count + 1
    END;
  LineCount := Count    
END;

PROCEDURE CopySortFiles(VAR File1, File2, FTemp: TEXT);
VAR
  Str1, Str2: STRING;
  F1L, F2L: INTEGER; 
BEGIN 
  REWRITE(FTemp);
  F1L := LineCount(File1);
  F2L := LineCount(File2);
  WRITELN('!!!!!', F1L, ' ', F2L, '!!!!!!');
  RESET(File1);
  RESET(File2);
  READLN(File1, Str1);
  READLN(File2, Str2);
  FOR Index := 1 TO (F1L + F2L) - 1
  DO
    BEGIN
      IF Str1 < Str2
      THEN
        BEGIN
          IF Str1 <> '' THEN WRITELN(FTemp, Str1) ELSE WRITELN('Пустой');
          IF NOT EOF(File1) THEN READLN(File1, Str1)
          ELSE 
            BEGIN
              Str1 := '';
              WRITELN(FTemp, Str2);
              READLN(File2, Str2)
            END
        END
      ELSE
        BEGIN
          IF Str2 <> '' THEN WRITELN(FTemp, Str2);
          IF NOT EOF(File2) THEN READLN(File2, Str2)
          ELSE 
            BEGIN
              Str2 := '';
              WRITELN(FTemp, Str1);
              {WRITELN(Str1);   }
              READLN(File1, Str1)
            END  
        END;
      WRITE(Index, Str1, ' - ', Str2, ' ')  
    END;
  F1L := LineCount(FTemp);
  WRITELN;
  WRITELN(F1L)  
END;

PROCEDURE CopyFiles(VAR File1, File2: TEXT); {Процедура копирования File1 в File2}
VAR
  Str: STRING;
BEGIN
  RESET(File1);
  REWRITE(File2);
  WRITELN('==========');
  WHILE NOT EOF(File1)
  DO
    BEGIN
      READLN(File1, Str);
      WRITELN(File2, Str)
    END
END;  
  
BEGIN {InsertSort2}
  ASSIGN(Inp, 'InpText.txt');
  ASSIGN(F1, 'F1.txt');
  ASSIGN(SortFile, 'SortFile.txt');
  ASSIGN(FTemp, 'FTemp.txt');
  {InitArrayForSort(ArrayForSort);  
  RESET(Inp);
  REWRITE(SortFile);
  Word := '';
  Index := 1;
  CountWord := 0;
  MaxAch := FALSE;
  WHILE NOT EOF(Inp)
  DO
    BEGIN
      READ(Inp, Ch);
      WHILE CheckLetter(Ch) = TRUE
      DO
        BEGIN
          Word := Word + Lower(Ch);
          READ(Inp, Ch);
        END;
      IF Word <> ''
      THEN
        BEGIN
          IF Index <= Max
          THEN
            BEGIN
              ArrayForSort[Index] := Word;
              INC(Index);
            END
          ELSE
            BEGIN
              MaxAch := TRUE;
              REWRITE(F1);
              SortArrayToFile(F1, ArrayForSort);
              InitArrayForSort(ArrayForSort);
              WRITELN('***');
              CopySortFiles(SortFile, F1, FTemp);
              WRITELN('///');              
              CopyFiles(Ftemp, SortFile);
              WRITELN('---');              
              Index := 1
            END;
          INC(CountWord);  
          Word := '';
        END  
    END;
  IF MaxAch = False THEN CopyFiles(F1, SortFile);  
  WRITELN('~~~~~~');  
  SortArrayToFile(F1, ArrayForSort);
  WRITELN(CountWord);   }
  CopySortFiles(SortFile, F1, FTemp);
END.  {InsertSort2}
