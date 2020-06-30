import React from 'react';
import ReactDOM from 'react-dom';

const Main =  () => {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Main Component</div>

                        <div className="card-body">React Section!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}
export default Main;
let myapp = document.getElementById('main');
ReactDOM.render(<Main/>, myapp);


