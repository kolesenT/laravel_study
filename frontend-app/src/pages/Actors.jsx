import { useEffect } from "react";
import { useRef, useState } from "react";
import ActorListItem from "../components/ActorListItem";

const Actors = () => {
    const dataActor = useRef(false);
    const [actors, setActors] = useState([]);
    const [status, setStatus] = useState('load');

    useEffect(() => {
        if (dataActor.current) {
            return;
        }

        dataActor.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/actors`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error!')
                }
                return response.json()
            })
            .then(json => { setActors(json.data); setStatus('success'); })
            .catch(() => setStatus('error'));
    }, []);

    if (status === 'load') {
        return <h1>Loading...</h1>
    }

    if (status === 'error') {
        return <h1>Loading Error!</h1>
    }

    return (
        <div className="row mt-4">
            <div className="col-md-8">
                {actors.map(actor =>
                    <ActorListItem
                        id={actor.id}
                        key={actor.id}
                        name={actor.name}
                        surname={actor.surname}
                        date_of_birth={actor.date_of_birth}
                        heigth={actor.heigth} />
                )}
            </div>
        </div>
    );
};

export default Actors;