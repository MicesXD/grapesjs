import { hasWin } from '../../utils/mixins';

export default class LocalStorage {
  async store(data, opts = {}) {
    if (this.hasLocal(opts, true)) {
      localStorage.setItem(opts.key, JSON.stringify(data));
    }
    console.log(data, opts);
  }

  async load(opts = {}) {
    let result = {};

    if (this.hasLocal(opts, true)) {
      result = JSON.parse(localStorage.getItem(opts.key) || '{}');
    }
    console.log(result);
    return result;
  }

  hasLocal(opts = {}, thr) {
    if (opts.checkLocal && (!hasWin() || !localStorage)) {
      if (thr) throw new Error('localStorage not available');
      return false;
    }

    return true;
  }
}
