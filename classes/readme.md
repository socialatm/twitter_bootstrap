Classes
All classes that your plugin defines SHOULD be included in a classes/ directory. 
This directory has special meaning to Elgg. Classes placed in this directory are autoloaded on demand, and do not need to be included explicitly.
Each file MUST have exactly one class defined inside it.
The file name MUST match the name of the one class that the file defines (except for the ".php" suffix).
Note: Files with a ".class.php" extension will NOT be recognized by Elgg.