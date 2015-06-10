PROGRAM InsertSort2(INPUT, OUTPUT);
USES SortToFile;

TYPE
  StateType = (NoEOF, BothEOF, FirstEOF, SecondEOF);  {состояние файлов при копировании в процедуре CopySortFiles}
  
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
  IF ((Ch >= 'А') AND (Ch <= 'Я')) OR ((Ch >= 'а') AND (Ch <= 'я'))
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

FUNCTION LineCount(VAR F: TEXT): INTEGER; {функция подсчета количества строк в файле}
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

PROCEDURE CopyFiles(VAR File1, File2: TEXT); {Процедура копирования File1 в File2}
VAR
  Str: STRING;
BEGIN
  RESET(File1);
  REWRITE(File2);
  WHILE NOT EOF(File1)
  DO
    BEGIN
      READLN(File1, Str);
      WRITELN(File2, Str)
    END
END;  

PROCEDURE CopySortFiles(VAR File1, File2, FTemp: TEXT); {процедура копирует из File1 и File2 в отсортированном порядке в FTemp}
VAR
  State: StateType;
  Str1, Str2: STRING;
BEGIN
  RESET(File1);
  RESET(File2);
  REWRITE(Ftemp);
  IF EOF(File1) THEN CopyFiles(File2, FTemp)
  ELSE
    BEGIN
      State := NoEOF;
      READLN(File1, Str1);
      READLN(File2, Str2);
      WHILE (State <> BothEOF)
      DO
        BEGIN
          IF (NOT EOF(File1)) AND (NOT EOF(File2))
          THEN
            State := NoEOF;
          IF (EOF(File1)) AND (NOT EOF(File2))
          THEN
            State := FirstEOF;
          IF (NOT EOF(File1)) AND (EOF(File2))
          THEN
            State := SecondEOF;  
          IF (EOF(File1)) AND (EOF(File2))
          THEN
            State := BothEOF;

          IF (State = NoEOF)
          THEN
            BEGIN
              IF Str1 < Str2
              THEN
                BEGIN
                  WRITELN(FTemp, Str1);
                  READLN(File1, Str1)
                END
              ELSE
                BEGIN
                  WRITELN(Ftemp, Str2);
                  READLN(File2, Str2)
                END  
            END;

          IF (State = FirstEOF)
          THEN
            BEGIN
              WHILE NOT EOF(File2)
              DO
                BEGIN
                  IF Str1 <> ''  
                  THEN
                    BEGIN
                      WRITELN(Ftemp, Str1);
                      WRITELN(Ftemp, Str2);
                      Str1 := ''
                    END;  
                  READLN(File2, Str2);
                  WRITELN(Ftemp, Str2)
                END
            END;
          
          IF (State = SecondEOF)
          THEN
            BEGIN
              WHILE NOT EOF(File1)
              DO
                BEGIN
                  IF ((Str2 <> '') AND (Str2 < Str1))
                  THEN
                    BEGIN
                      WRITELN(Ftemp, Str2);
                      Str2 := ''
                    END;
                  WRITELN(Ftemp, Str1);                    
                  READLN(File1, Str1)
                END;
              WRITELN(Ftemp, Str1);
              WRITE(FTemp, Str2);  
            END 
        END       
    END
END; 

PROCEDURE CounterWords(VAR F, SortF: TEXT);
VAR
  Str1, Str2: STRING;
  OneWord: INTEGER;
BEGIN
  OneWord := LineCount(F);
  REWRITE(SortF);
  WRITELN(SortF, 'Общее количество слов - ', OneWord);
  RESET(F);
  OneWord := 1;
  READLN(F, Str1);      
  WHILE NOT EOF(F)
  DO
    BEGIN
      READLN(F, Str2);  
      IF (Str1 <> Str2)
      THEN
        BEGIN
          WRITELN(SortF, Str1, ' - ', OneWord);
          OneWord := 1;
          Str1 := Str2
        END
      ELSE
        BEGIN
          INC(OneWord)
        END  
    END;
  WRITELN(SortF, Str1, ' - ', OneWord);
  
  
END;

BEGIN {InsertSort2}
  ASSIGN(Inp, 'since.txt');
  ASSIGN(F1, 'SortPart.txt');
  ASSIGN(SortFile, 'SortFile.txt');
  ASSIGN(FTemp, 'FTemp.txt');
  InitArrayForSort(ArrayForSort);  
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
      WHILE (CheckLetter(Ch) = TRUE)
      DO
        BEGIN
          Word := Word + Lower(Ch);
          READ(Inp, Ch)
        END;
      IF Word <> ''
      THEN
        BEGIN
          IF Index <= Max
          THEN
            BEGIN
              ArrayForSort[Index] := Word;
              INC(Index)
            END
          ELSE
            BEGIN
              MaxAch := TRUE;
              REWRITE(F1);
              SortArrayToFile(F1, ArrayForSort);
              InitArrayForSort(ArrayForSort);
              CopySortFiles(SortFile, F1, FTemp);
              CopyFiles(Ftemp, SortFile);
              Index := 1;
              ArrayForSort[Index] := Word;
              INC(Index)
            END;
          INC(CountWord);
          WRITELN(CountWord, Word);  
          Word := ''
        END  
    END;
  IF MaxAch = False THEN CopyFiles(F1, Ftemp); {при маленьком входном файле(до 50 слов)}
  SortArrayToFile(F1, ArrayForSort); 
  CopySortFiles(SortFile, F1, FTemp);
  CounterWords(FTemp, SortFile)
END.  {InsertSort2}
