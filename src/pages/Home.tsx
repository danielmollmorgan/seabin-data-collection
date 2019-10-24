import {
  IonContent,
  IonHeader,
  IonFooter,
  IonPage,
  IonTitle,
  IonToolbar,
  IonButton,
  IonButtons,
  IonIcon
} from '@ionic/react';

import React, { useState } from 'react';

import Measurement from '../components/measurement/Measurement';

const Home: React.FC = () => {
  const [measurements, setMeasurements]: any = useState([Measurement]);

  const handleAddMeasurement = (e: React.FormEvent) => {
    e.preventDefault();
    setMeasurements([...measurements, Measurement]);
  };

  const handleRemoveMeasurement = (e: React.FormEvent, index: number) => {
    e.preventDefault();
    console.log(e, index);
  };

  const handleSave = (e: React.FormEvent) => {
    e.preventDefault();
    console.log(e);
  };

  return (
    <IonPage>
      <IonHeader translucent>
        <IonToolbar>
          <IonTitle>Seabin Project</IonTitle>
        </IonToolbar>
      </IonHeader>
      <IonContent className="ion-padding">
        {measurements.map((Component: any, i: number) => {
          const shouldCollapse = measurements.length !== i && i > 1;
          return (
            <>
              <Component key={`measurement_${i}`} collapse={shouldCollapse} />
              <IonButton
                type="button"
                key={`button_remove_${i}`}
                onClick={e => {
                  handleRemoveMeasurement(e, i);
                }}
              >
                <IonIcon name="close-circle" />
              </IonButton>
            </>
          );
        })}
        <form onSubmit={handleAddMeasurement}>
          <div className="ion-padding">
            <IonButton expand="block" type="submit" className="ion-no-margin">
              Add <IonIcon name="add-circle-outline" />
            </IonButton>
          </div>
        </form>
      </IonContent>
      <IonFooter>
        <IonToolbar>
          <form onSubmit={handleSave}>
            <div className="ion-padding">
              <IonButton expand="block" type="submit" className="ion-no-margin">
                Save
              </IonButton>
            </div>
          </form>
        </IonToolbar>
      </IonFooter>
    </IonPage>
  );
};

export default Home;
