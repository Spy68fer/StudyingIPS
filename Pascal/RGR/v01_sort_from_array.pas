PROGRAM InsertSort2(INPUT, OUTPUT);
CONST
  MAX = 60;
TYPE 
  NodePtr = ^Node;
  Node = RECORD
           Next: NodePtr;
           Key: STRING
         END; 
  ArraySort = ARRAY [1 .. Max] OF STRING;      
VAR
  FirstPtr, NewPtr, Curr, Prev: NodePtr;
  Found: BOOLEAN;
  ArrayForSort: ArraySort;
  Index: INTEGER;
  SortFile: TEXT;
  
PROCEDURE InitArrayForSort(VAR Arr: ArraySort);
BEGIN
  FOR Index := 1 TO Max
  DO
    Arr[Index] := '-';  
END;
  
PROCEDURE SortArrayToFile(VAR Arr: ArraySort);
  VAR
    SortFile: TEXT;

BEGIN {SortArrayToFile}   
  ASSIGN(SortFile, 'SortFile.txt');
  FirstPtr := NIL;
  FOR Index := 1 TO Max
  DO
    BEGIN
      IF Arr[Index] <> '-'
      THEN
        BEGIN
          NEW(NewPtr);
          NewPtr^.Key := Arr[Index];
          {2.1. Поместить NewPtr в надлежащее место}
          Prev := NIL;
          Curr := FirstPtr;
          {2.1.1 Найдем значение Prev и Curr, такие что Prev^.Key <= NewPtr^.Key <= Curr^.Key}
          Found := FALSE;
          WHILE (Curr <> NIL) AND NOT Found
          DO
            IF NewPtr^.Key > Curr^.Key
            THEN
              BEGIN
                Prev := Curr;
                Curr := Curr^.Next
              END
            ELSE
              Found := TRUE;
          NewPtr^.Next := Curr;
          IF Prev = NIL 
          THEN
            FirstPtr := NewPtr
          ELSE
            Prev^.Next := NewPtr;
        END
    END;  
  {2.2. Печать значений начиная с FirstPtr^.Key}
  NewPtr := FirstPtr;
  REWRITE(SortFile);
  WHILE NewPtr <> NIL
  DO
    BEGIN
      WRITELN(SortFile, NewPtr^.Key);
      NewPtr := NewPtr^.Next
    END
END; {SortArrayToFile}

  
BEGIN {InsertSort2}
  InitArrayForSort(ArrayForSort);
  ArrayForSort[1] := 'adfxjslfkdsjg;sfgh'; ArrayForSort[2] := 'adffqsdgwghf';
  ArrayForSort[3] := 'jdfffewfegh'; ArrayForSort[4] := 'kvoffgh';
  ArrayForSort[5] := 'asfwgfhhgh'; ArrayForSort[6] := 'evefgwraqfgh';
  ArrayForSort[7] := 'gdasfwqgsfgh'; ArrayForSort[8] := 'defgdasgqh';
  ArrayForSort[9] := 'agsjffwefeaeffgh'; ArrayForSort[10] := 'fgwgfffafwegh';
  ArrayForSort[11] := 'ajtdghfgreqhfgh'; ArrayForSort[12] := 'qqfdgdsgffgh';
  SortArrayToFile(ArrayForSort);  
END.  {InsertSort2}

