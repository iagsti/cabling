import {Resource} from './Resource';

const ELEMENT = 'locals';

export class LocalResource extends Resource {

    static index (action, page, search, errors) {

        let query = this.generateQuery(search);

        console.log(ELEMENT + '?page=' + page + query);

        this._getApi().get(ELEMENT + '?page=' + page + query).then((response) => {

            action(response.data);

        }).catch(errors);

    }

    static create (action, form, errors) {

        this._getApi().post('locals', form).then(response => {

            action(response);

        }).catch(errors);

    }

}