import Traditional from "./traditional";

export default class Conversions {
    constructor() {

    }
    // isLetter(e) {

    //     let char = String.fromCharCode(e.keyCode); // Get the character
    //     if (/^[A-Za-z\s]+$/.test(char)) return true;
    //     // Match with regex
    //     else e.preventDefault();
    // }

    // isName(e) {
    //     let char = String.fromCharCode(e.keyCode); // Get the character
    //     if (/^[A-Za-z\s]+$/.test(char)) return true;
    //     // Match with regex
    //     else e.preventDefault(); // If not match, don't add to input text
    // }
    // isNumber(evt) {
    //     evt = evt ? evt : window.event;
    //     var charCode = evt.which ? evt.which : evt.keyCode;
    //     if (
    //         charCode > 31 &&
    //         (charCode < 48 || charCode > 57) &&
    //         charCode !== 46
    //     ) {
    //         evt.preventDefault();
    //     } else {
    //         return true;
    //     }
    // }
    translateNepali(value, e) {
        let t = new Traditional();
        let val = t.AutoConvertBetweenEnglishToTraditional(
            value,
            e
        );
        return val;
    }
    // isLetterOrNumber(e) {
    //     let char = String.fromCharCode(e.keyCode);
    //     if (/^[A-Za-z0-9]+$/.test(char)) return true;
    //     else e.preventDefault();
    // }

    // ConvertADtoBS(date) {
    //     var convertedDate = moment(date).format("YYYY/MM/DD");
    //     var converted_date_bs = adbs.ad2bs(convertedDate);
    //     if (`${converted_date_bs.en.month}` <= 9)
    //         converted_date_bs.en.month = "0" + converted_date_bs.en.month;
    //     if (`${converted_date_bs.en.day}` <= 9)
    //         converted_date_bs.en.day = "0" + converted_date_bs.en.day;
    //     return `${converted_date_bs.en.year}-${converted_date_bs.en.month}-${converted_date_bs.en.day}`;
    // }
    // ConvertBStoAD(date) {

    //     var date_To_convert = moment(date).format("YYYY/MM/DD");
    //     var converted_date_ad = adbs.bs2ad(date_To_convert);
    //     if (`${converted_date_ad.month}` <= 9)
    //         converted_date_ad.month = "0" + converted_date_ad.month;
    //     if (`${converted_date_ad.day}` <= 9)
    //         converted_date_ad.day = "0" + converted_date_ad.day;
    //     return `${converted_date_ad.year}-${converted_date_ad.month}-${converted_date_ad.day}`;
    // }

}