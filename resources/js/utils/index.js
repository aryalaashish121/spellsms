const toggleFullScreen = () => {
    const doc = window.document;
    const docEl = doc.documentElement;
    const requestFullscreen = docEl.requestFullscreen
        || docEl.mozRequestFullScreen
        || docEl.webkitRequestFullScreen
        || docEl.msRequestFullscreen;
    const cancelFullScreen = doc.exitFullscreen
        || doc.mozCancelFullScreen
        || doc.webkitExitFullscreen
        || doc.msExitFullscreen;
    if (!doc.fullscreenElement
        && !doc.mozFullScreenElement
        && !doc.webkitFullscreenElement
        && !doc.msFullscreenElement) {
        requestFullScreen.call(docEl);
        return true;
    }
 
    cancelFullScreen.call(doc);
    return false;
};

export { toggleFullScreen }
