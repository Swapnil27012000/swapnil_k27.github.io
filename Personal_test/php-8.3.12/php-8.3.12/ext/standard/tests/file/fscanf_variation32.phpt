--TEST--
Test fscanf() function: usage variations - octal formats with boolean
--FILE--
<?php

/* Test fscanf() to scan boolean data using different octal format types */

$file_path = __DIR__;

echo "*** Test fscanf(): different octal format types with boolean data ***\n";

// create a file
$filename = "$file_path/fscanf_variation32.tmp";
$file_handle = fopen($filename, "w");
if($file_handle == false)
  exit("Error:failed to open file $filename");

// array of boolean types
$bool_types = array (
  true,
  false,
  TRUE,
  FALSE,
);

$octal_formats = array(  "%o",
             "%ho", "%lo", "%Lo",
             " %o", "%o ", "% o",
             "\t%o", "\n%o", "%4o",
             "%30o", "%[0-7]", "%*o"
         );

$counter = 1;

// writing to the file
foreach($bool_types as $value) {
  @fprintf($file_handle, $value);
  @fprintf($file_handle, "\n");
}
// closing the file
fclose($file_handle);

// opening the file for reading
$file_handle = fopen($filename, "r");
if($file_handle == false) {
  exit("Error:failed to open file $filename");
}

$counter = 1;
// reading the values from file using different octal formats
foreach($octal_formats as $octal_format) {
  // rewind the file so that for every foreach iteration the file pointer starts from bof
  rewind($file_handle);
  echo "\n-- iteration $counter --\n";
  while( !feof($file_handle) ) {
    try {
      var_dump(fscanf($file_handle,$octal_format));
    } catch (ValueError $exception) {
      echo $exception->getMessage() . "\n";
    }
  }
  $counter++;
}

echo "\n*** Done ***";
?>
--CLEAN--
<?php
$file_path = __DIR__;
$filename = "$file_path/fscanf_variation32.tmp";
unlink($filename);
?>
--EXPECT--
*** Test fscanf(): different octal format types with boolean data ***

-- iteration 1 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 2 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 3 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 4 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 5 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 6 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 7 --
Bad scan conversion character " "
Bad scan conversion character " "
Bad scan conversion character " "
Bad scan conversion character " "
bool(false)

-- iteration 8 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 9 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 10 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 11 --
array(1) {
  [0]=>
  int(1)
}
NULL
array(1) {
  [0]=>
  int(1)
}
NULL
bool(false)

-- iteration 12 --
array(1) {
  [0]=>
  string(1) "1"
}
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  string(1) "1"
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 13 --
array(0) {
}
NULL
array(0) {
}
NULL
bool(false)

*** Done ***
