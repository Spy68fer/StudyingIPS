PROGRAM InsertSort2(INPUT, OUTPUT);
USES SortToFile;
VAR
  ArrayForSort: ArraySort;
  CountWord, Index: INTEGER;
  Ch: CHAR;
  Inp: TEXT;
  Word: STRING;

FUNCTION CheckLetter(Ch: CHAR): BOOLEAN; {функция проверки на принадлежность к кириллическим символам}
BEGIN {CheckLetter}
  CheckLetter := FALSE;
  IF ((Ch >= 'А') AND (Ch <= 'Я')) OR ((Ch >= 'а') AND (Ch <= 'я')) {OR ((Ch >= 'р') AND (Ch <= 'я')) }
  THEN 
    CheckLetter := TRUE
END; {CheckLetter}

FUNCTION Lower(Ch: CHAR): CHAR; {функция понижения регистра}
BEGIN
  IF ((ORD(Ch)>=192) AND (ORD(Ch) <= 223))
  THEN
    Lower := CHR(ORD(Ch) + 32)
  ELSE
    Lower := Ch  
END;

FUNCTION LineCount(VAR F: TEXT): INTEGER;
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

PROCEDURE CopySortFiles(VAR F1, F2: TEXT);
VAR
  F3: TEXT;
  Str1, Str2: STRING;
  F1L, F2L: INTEGER; 
BEGIN 
  ASSIGN(F3, 'F3.txt');
  REWRITE(F3);
  F1L := LineCount(F1);
  F2L := LineCount(F2); 
  RESET(F1);
  RESET(F2);
  READLN(F1, Str1);
  READLN(F2, Str2);
  FOR Index := 1 TO (F1L + F2L)
  DO
    BEGIN
      IF Str1 < Str2
      THEN
        BEGIN
          IF Str1 <> '' THEN WRITELN(F3, Str1);
          IF NOT EOF(F1) THEN READLN(F1, Str1)
          ELSE 
            BEGIN
              Str1 := '';
              WRITELN(F3, Str2);
              READLN(F2, Str2)
            END
        END
      ELSE
        BEGIN
          IF Str2 <> '' THEN WRITELN(F3, Str2);
          IF NOT EOF(F2) THEN READLN(F2, Str2)
          ELSE 
            BEGIN
              Str2 := '';
              WRITELN(F3, Str1);
              READLN(F1, Str1)
            END  
        END  
    END;
END;
  
BEGIN {InsertSort2}
  ASSIGN(Inp, 'InpText.txt');
  RESET(Inp);
  Word := '';
  Index := 1;
  CountWord := 0;
  InitArrayForSort(ArrayForSort);
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
               INC(Index)
             END
           ELSE
             BEGIN
               SortArrayToFile(ArrayForSort);
               InitArrayForSort(ArrayForSort);
               Index := 1
             END;  
          INC(CountWord);    
          Word := '';
        END  
    END;
  WRITELN(CountWord);  
  SortArrayToFile(ArrayForSort);

END.  {InsertSort2}
