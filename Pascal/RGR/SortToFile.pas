UNIT SortToFile;
INTERFACE
  CONST
    Max = 50;
  TYPE 
    NodePtr = ^Node;
    Node = RECORD
             Next: NodePtr;
             Key: STRING
           END; 
    ArraySort = ARRAY [1 .. Max] OF STRING;
PROCEDURE InitArrayForSort(VAR Arr: ArraySort);   
PROCEDURE SortArrayToFile(VAR SortFile: TEXT; VAR Arr: ArraySort);    
IMPLEMENTATION
VAR
  FirstPtr, NewPtr, Curr, Prev: NodePtr;
  Found: BOOLEAN;
  ArrayForSort: ArraySort;
  Index: INTEGER;
  
PROCEDURE InitArrayForSort(VAR Arr: ArraySort);
BEGIN
  FOR Index := 1 TO Max 
  DO
    Arr[Index] := '-';  
END;

PROCEDURE SortArrayToFile(VAR SortFile: TEXT; VAR Arr: ArraySort);
BEGIN {SortArrayToFile}   
  REWRITE(SortFile);
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
  WHILE NewPtr <> NIL
  DO
    BEGIN
      WRITELN(SortFile, NewPtr^.Key);
      NewPtr := NewPtr^.Next
    END
END; {SortArrayToFile}

BEGIN

END.
