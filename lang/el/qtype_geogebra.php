<?php

/**
 * Strings for component 'qtype_geogebra'
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
$string['pluginname'] = 'GeoGebra';
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'Προσθήκη περιορισμών (συνθηκών) στις μεταβλητές.';
$string['addmorevarblanks'] = 'Κενά για {no} περισσότερες μεταβλητές';
$string['answerinvalid'] = 'Η απάντηση-συμβολοσειρά δεν είναι έγκυρη. Αυτό δεν μπορεί να συμβαίνει.';
$string['answermissing'] = 'Η απάντηση λείπει. Πιθανώς η JavaScript δεν είναι ενεργοποιημένη ή συνέβη κάποιο άγνωστο λάθος στο φυλλομετρητή';
$string['answervar'] = 'Μεταβλητές για αυτόματη βαθμολόγηση';
$string['answervar_help'] = 'For automatic grading: A name of a boolean object in GeoGebra which is true if the student solved the question (partly). Sums up all grades for all boolean variables. The question is correct if any combination exceeds 100%, but there should be at least one combination which sums up to exactly 100%. Leave blank for manual grading.';
$string['constraints'] = 'Σταθερές (συνθήκες)';
$string['constraints_help'] = 'Are there any constraints for variables, such as a < b, which could not be declared using the slider options? Comma separated. Supported relations are: <, <=, >, >=. If you need an equality you have to use the same variable when creating the GeoGebra worksheet. Dynamic ranges, ie using variables for slider min/max are not supported.';
$string['constraintswrongortoohard'] = '{$a->inequalities} are wrong or too hard to meet, we tried (brute force) {$a->tries} times in {$a->time} seconds. Maybe we\'ll use a better method in the future...';
$string['feedback'] = 'Feedback when the variable is true';
$string['feedback_help'] = 'The feedback is automatically taken from caption of the variable in the GeoGebra file.';
$string['geogebraapplet'] = 'Εφαρμογή GeoGebra';
$string['getvars'] = 'Πάρτε μεταβλητές που μπορούν να γίνουν τυχαίες από την εφαρμογή';
$string['ggbfilemissing'] = 'The base64 string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['ggbturl'] = 'URL ή  ID του φύλλου εργασίας του GeoGebraTube';
$string['ggbturl_help'] = 'You could either use the share button on GeoGebraTube and copy and paste the link or use the GeoGebraTube repository. The applet and parameters are stored in the database, the applet will not be reloaded from GeoGebraTube unless requested. Just providing the ID or sharing key of the Applet is also supported.';
$string['ggbxmlmissing'] = 'The XML string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['invalidinequality'] = '{$a} δεν είναι έγκυρο';
$string['israndomized'] = 'Υπάρχουν μεταβλητές που θα πρέπει να είναι τυχαίες;';
$string['loadapplet'] = '(Ξανα)φόρτωσε και δείξε την εφαρμογή';
$string['loadapplet_help'] = '(Ξανα)φόρτωσε την εφαρμογή από το GeoGebraTube και να αποθηκεύσετε τη νέα έκδοση από GeoGebraTube στη βάση δεδομένων.';
$string['mineqmax'] = 'Min and Max for the randomization aren\'t specified properly for variable {$a}, either you haven\'t specified the slider’s min and max or the element isn\'t a slider at all. You probably have to correct this in your GeoGebra file.';
$string['minplusstepgtmax'] = 'Min plus increment is greater than Max for variable {$a}, you probably have to correct this in your GeoGebra file.';
$string['noappletloaded'] = 'Δεν φορτώθηκε καμμιά εφαρμογή! Ελέγξτε αν το URL είναι σωστό και αν δείτε μια εφαρμογή μετά τη επιλογή του δεσμού ή  (ξανα) φόρτωση της εφαρμογής';
$string['nofractionsumeq1'] = 'Τουλάχιστον ένας συνδυασμός των βαθμών πρέπει να έχει άθροισμα 100%';
$string['pluginname_help'] = 'Ερωτήσεις όπου ο μαθητής μπορεί να λύσει το πρόβλημα με τη χρήση του GeoGebra';
$string['pluginnameadding'] = 'Προσθήκη μιας ερώτησης στο GeoGebra';
$string['pluginnameediting'] = 'Επεξεργασία μια ερώτηση στο GeoGebra';
$string['pluginnamesummary'] = 'Μια έκδοση του υπολογίζεται ερωτήσεις που χρησιμοποιεί το GeoGebra για να δείξει την ερώτηση και την επαλήθευση της απάντησης όταν το κουίζ πραγματοποιηθεί.';
$string['randomizedbutnovars'] = 'Έχετε επιλέξει ότι η ερώτηση πρέπει να είναι τυχαία, αλλά δεν ορίσατε κάποιες μεταβλητές να είναι τυχαίες.';
$string['randomizedvar'] = 'Μεταβλητές που πρέπει να είναι τυχαίες';
$string['randomizedvar_help'] = 'Οι μεταβλητές  θα πρέπει να είναι τυχαίες (χωρισμένες με κόμμα). Χρησιμοποιήστε τις επιλογές του δρομές στο GeoGebra για να δηλώσετε το Ελάχιστο , Μέγιστο και την Αύξηση. Οι μεταβλητές αυτές μπορούν επίσης να χρησιμοποιηθούν στο κείμενο της ερώτησης με εγκλεισμό τους σε άγκιστρα, για παράδειγμα: {a}';
$string['stepzero'] = 'Η αύξηση είναι 0 για τη μεταβλητή {$ 5}; είτε δεν έχετε ορίσει την αύξηση στον δρομέα ή το στοιχείο δεν είναι κάποιος δρομέας.  Πρέπει να το  διορθώσετε αυτό στο αρχείο του GeoGebra.';
$string['valuecheckedfor'] = 'Αντικείμενο Boolean  στο GeoGebra το οποίο χρησιμοποιείται για να ελέγξει την ορθότητα.';
$string['variablenamewrong'] = 'Δεν υπάρχει μεταβλητή με το όνομα αυτό στο αρχείο GeoGebra.';
$string['variableno'] = 'Μεταβλητή {$a}';
$string['variables'] = 'Μεταβλητές';
$string['willbereadfromfile'] = 'Θα διαβαστεί από το GeoGebra ... (δείτε το κουμπί βοήθειας)';