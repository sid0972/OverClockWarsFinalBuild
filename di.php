<?PHP
session_start();
  // filetypes to display
  $imagetypes = array("image/jpeg", "image/gif");
?>

<?PHP
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  function getImages($dir)
  {
    global $imagetypes;

    // array to hold return value
    $retval = array();

    // add trailing slash if missing
    if(substr($dir, -1) != "/") $dir .= "/";

    // full server path to directory
    $fulldir = "{$_SERVER['DOCUMENT_ROOT']}/$dir";

    $d = @dir($fulldir) or die("getImages: Failed opening directory $dir for reading");
    while(false !== ($entry = $d->read())) {
      // skip hidden files
      if($entry[0] == ".") continue;

      // check for image files
      $f = escapeshellarg("$fulldir$entry");
      $mimetype = trim(`file -bi $f`);
      foreach($imagetypes as $valid_type) {
        if(preg_match("@^{$valid_type}@", $mimetype)) {
          $retval[] = array(
           'file' => "/$dir$entry",
           'size' => getimagesize("$fulldir$entry")
          );
          break;
        }
      }
    }
    $d->close();

    return $retval;
  }
?>

<?PHP
  $dir="./uploads/".$_SESSION['valid_user']."/";
  $images = getImages(".$dir.");

  // display on page
  foreach($images as $img) {
    echo "<img class=\"photo\" src=\"{$img['file']}\" {$img['size'][3]} alt=\"\">\n";
  }
?>
