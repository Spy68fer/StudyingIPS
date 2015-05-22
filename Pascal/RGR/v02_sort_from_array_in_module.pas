PROGRAM InsertSort2(INPUT, OUTPUT);
USES SortToFile;
VAR
  ArrayForSort: ArraySort;
  CountWord, Index: INTEGER;
  Ch: CHAR;
  Inp: TEXT;
  Word: STRING;

FUNCTION CheckLetter(Ch: CHAR): BOOLEAN; {������� �������� �� �������������� � ������������� ��������}
BEGIN {CheckLetter}
  CheckLetter := FALSE;
  IF ((Ch >= '�') AND (Ch <= '�')) OR ((Ch >= '�') AND (Ch <= '�')) {OR ((Ch >= '�') AND (Ch <= '�')) }
  THEN 
    CheckLetter := TRUE
END; {CheckLetter}

FUNCTION Lower(Ch: CHAR): CHAR; {������� ��������� ��������}
BEGIN
  IF ((ORD(Ch)>=192) AND (ORD(Ch) <= 223))
  THEN
    Lower := CHR(ORD(Ch) + 32)
  ELSE
    Lower := Ch  
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
               Index := 1;
             END;  
          INC(CountWord);    
          Word := '';
        END  
    END;
  WRITELN(CountWord);  
  SortArrayToFile(ArrayForSort);
   
END.  {InsertSort2}
